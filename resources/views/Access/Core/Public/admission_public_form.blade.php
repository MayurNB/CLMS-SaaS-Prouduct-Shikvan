<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Admission Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8fafc; font-family: 'Inter', sans-serif; }
        .input-field { 
            @apply w-full p-4 bg-white border-2 border-gray-100 rounded-2xl transition-all duration-200 text-gray-900 focus:border-blue-600 focus:ring-4 focus:ring-blue-50 outline-none;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .section-card { @apply bg-white p-8 rounded-[2rem] shadow-xl mb-8 border border-gray-50 relative overflow-hidden; }
        .input-label { @apply block text-[10px] font-black text-gray-400 mb-2 ml-1 uppercase tracking-widest; }
        .doc-capture-box { @apply relative bg-gray-50 rounded-2xl aspect-video mb-4 border-2 border-dashed border-gray-200 flex items-center justify-center overflow-hidden; }
        video, img { @apply absolute inset-0 w-full h-full object-cover; }
    </style>
</head>
<body>

    <div id="tokenOverlay" class="fixed inset-0 bg-blue-900 z-[100] flex items-center justify-center p-4">
        <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl max-w-md w-full text-center">
            <div class="bg-blue-50 w-20 h-20 rounded-3xl flex items-center justify-center mx-auto mb-6">
                <i class="fa fa-id-badge text-blue-600 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-800 mb-2">Welcome</h2>
            <p class="text-gray-500 mb-8">Enter your admission token to access the portal.</p>
            <input type="text" id="tokenInput" placeholder="ADM-XXXXXX" class="w-full p-5 bg-gray-50 border-2 border-gray-100 rounded-2xl mb-6 text-center font-mono text-2xl uppercase focus:border-blue-600 outline-none transition-all">
            <div class="flex gap-4">
                <button onclick="verifyAdmissionToken('new')" class="flex-1 bg-blue-600 text-white py-5 rounded-2xl font-bold hover:bg-blue-700 transform active:scale-95 transition-all">START</button>
                <button onclick="verifyAdmissionToken('track')" class="flex-1 bg-gray-100 text-gray-700 py-5 rounded-2xl font-bold hover:bg-gray-200">TRACK</button>
            </div>
        </div>
    </div>

    <main id="mainPortal" class="hidden">
        <div id="heroSection" class="bg-gradient-to-br from-blue-900 to-blue-800 text-white py-14 px-6 mb-10 bg-cover bg-center">
            <div class="max-w-6xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-6">
                    <div class="bg-white p-4 rounded-2xl shadow-xl"><img id="instLogo" src="" width="50" alt="Logo" class="object-contain"></div>
                    <div>
                        <h1 id="instName" class="text-4xl font-black tracking-tighter uppercase">--</h1>
                        <p id="branchName" class="text-blue-200 uppercase text-xs font-bold tracking-[0.3em] opacity-80 mt-1">--</p>
                    </div>
                </div>
                <div class="bg-blue-800/50 backdrop-blur-md border border-white/10 p-4 rounded-2xl text-right">
                    <span class="text-[10px] font-black text-blue-300 uppercase block mb-1">Authenticated Token</span>
                    <span id="activeTokenDisplay" class="font-mono text-xl font-bold text-white tracking-widest">--</span>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto px-4 pb-20">
            <form id="dynamicAdmissionForm" onsubmit="handleFormSubmit(event)" class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="token" id="tokenHidden">
                
                <div class="lg:col-span-8" id="formSectionsContainer"></div>

                <div class="lg:col-span-4">
                    <div class="sticky top-10 space-y-6">
                        <div class="section-card !p-6 text-center">
                            <span class="input-label block mb-4">Learner Portrait</span>
                            <div class="relative bg-gray-50 rounded-3xl aspect-square mb-6 border-2 border-gray-100 flex items-center justify-center overflow-hidden">
                                <video id="vid-profile" autoplay playsinline class="hidden"></video>
                                <img id="img-profile" class="hidden">
                                <i id="icon-profile" class="fa fa-user-circle text-gray-200 text-8xl"></i>
                            </div>
                            <div class="space-y-3">
                                <button type="button" onclick="openCam('profile')" class="w-full bg-blue-600 text-white p-4 rounded-xl font-bold">OPEN CAMERA</button>
                                <button type="button" onclick="capture('profile')" id="cap-profile" class="hidden w-full bg-green-600 text-white p-4 rounded-xl font-bold">CAPTURE</button>
                                <label class="block w-full bg-gray-100 text-gray-600 p-4 rounded-xl font-bold cursor-pointer hover:bg-gray-200">
                                    UPLOAD <input type="file" class="hidden" accept="image/*" onchange="fileUp(event, 'profile')">
                                </label>
                            </div>
                            <input type="hidden" name="form_data[learner_image_url]" id="input-profile">
                        </div>
                        <button type="submit" id="submitBtn" class="w-full bg-blue-600 text-white py-8 rounded-[2rem] font-black text-2xl shadow-2xl hover:bg-blue-700 transition-all">SUBMIT APPLICATION</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <canvas id="canvas" class="hidden"></canvas>

    <script>
let streams = {};
const canvas = document.getElementById('canvas');

/* ===============================
   IMAGE COMPRESSION
================================ */
async function compressImage(base64Str) {
    return new Promise((resolve) => {
        const img = new Image();
        img.src = base64Str;
        img.onload = () => {
            const MAX_WIDTH = 1000;
            let width = img.width, height = img.height;

            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }

            canvas.width = width;
            canvas.height = height;
            canvas.getContext('2d').drawImage(img, 0, 0, width, height);

            resolve(canvas.toDataURL('image/jpeg', 0.7));
        };
    });
}

/* ===============================
   VERIFY TOKEN
================================ */
async function verifyAdmissionToken(mode) {
    const token = document.getElementById('tokenInput').value;
    if (!token) return alert("Enter Token");

    try {
        const response = await fetch('/public/admission/verify-token', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ token })
        });

        const data = await response.json();

        if (!data.status) {
            alert(data.message);
            return;
        }

        if (mode === 'track') {
            alert("Status: " + data.admission_status);
        } else {
            renderForm(data);
        }

    } catch (e) {
        alert("Error connecting to server.");
    }
}

/* ===============================
   RENDER FORM
================================ */
function renderForm(data) {
    document.getElementById('tokenOverlay').classList.add('hidden');
    document.getElementById('mainPortal').classList.remove('hidden');

    document.getElementById('branchName').innerText = data.branch.branch_name;
    document.getElementById('instName').innerText = data.institute.institute_name;
    document.getElementById('instLogo').src = data.institute.logo_url;
    document.getElementById('activeTokenDisplay').innerText = data.token;
    document.getElementById('tokenHidden').value = data.token;

    const container = document.getElementById('formSectionsContainer');
    container.innerHTML = "";

    const groups = data.fields.reduce((acc, f) => {
        acc[f.type] = acc[f.type] || [];
        acc[f.type].push(f);
        return acc;
    }, {});

    let step = 1;

    for (const [type, fields] of Object.entries(groups)) {
        let sectionHtml = `
        <div class="section-card">
            <h2 class="text-2xl font-black text-blue-900 mb-6 flex items-center gap-3">
                <span class="bg-blue-600 text-white w-8 h-8 rounded-lg flex items-center justify-center text-sm">
                    ${step++}
                </span>
                ${type} Details
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        `;

        fields.forEach(f => {
            if (f.type === 'Documents') {
                sectionHtml += `
                <div class="col-span-2 md:col-span-1">
                    <label class="input-label">${f.field_label}</label>

                    <div class="doc-capture-box">
                        <video id="vid-${f.field_name}" autoplay playsinline class="hidden"></video>
                        <img id="img-${f.field_name}" class="hidden">
                        <i id="icon-${f.field_name}" class="fa fa-file-invoice text-gray-200 text-4xl"></i>
                    </div>

                    <div class="flex gap-2">
                        <button type="button" onclick="openCam('${f.field_name}')"
                            class="flex-1 bg-gray-800 text-white p-2 rounded-lg text-[10px] font-bold">
                            SCAN
                        </button>

                        <button type="button" onclick="capture('${f.field_name}')"
                            id="cap-${f.field_name}"
                            class="hidden flex-1 bg-green-600 text-white p-2 rounded-lg text-[10px] font-bold">
                            CAPTURE
                        </button>

                        <label class="flex-1 bg-gray-200 text-center p-2 rounded-lg text-[10px] font-bold cursor-pointer">
                            UPLOAD
                            <input type="file" class="hidden"
                                onchange="fileUp(event, '${f.field_name}')">
                        </label>
                    </div>

                    <input type="hidden" name="form_data[${f.field_name}]"
                        id="input-${f.field_name}">
                </div>
                `;
            } else {
                sectionHtml += `
                <div>
                    <label class="input-label">
                        ${f.field_label}
                        ${f.is_required ? '<span class="text-red-500">*</span>' : ''}
                    </label>

                    <input type="text"
                        name="form_data[${f.field_name}]"
                        class="input-field"
                        ${f.is_required ? 'required' : ''}>
                </div>
                `;
            }
        });

        sectionHtml += `</div></div>`;
        container.insertAdjacentHTML('beforeend', sectionHtml);
    }
}

/* ===============================
   CAMERA
================================ */
async function openCam(type) {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({
            video: { facingMode: "environment" }
        });

        streams[type] = stream;

        const v = document.getElementById(`vid-${type}`);
        v.srcObject = stream;
        v.classList.remove('hidden');

        document.getElementById(`cap-${type}`).classList.remove('hidden');
        if (document.getElementById(`icon-${type}`))
            document.getElementById(`icon-${type}`).classList.add('hidden');

    } catch (err) {
        alert("Camera access denied.");
    }
}

async function capture(type) {
    const v = document.getElementById(`vid-${type}`);

    canvas.width = v.videoWidth;
    canvas.height = v.videoHeight;
    canvas.getContext('2d').drawImage(v, 0, 0);

    const base64 = canvas.toDataURL('image/jpeg', 0.9);
    const compressed = await compressImage(base64);

    const url = await uploadToCloudinary(compressed);
    if (!url) return;

    document.getElementById(`input-${type}`).value = url;

    document.getElementById(`img-${type}`).src = compressed;
    document.getElementById(`img-${type}`).classList.remove('hidden');

    v.classList.add('hidden');
    document.getElementById(`cap-${type}`).classList.add('hidden');

    if (streams[type])
        streams[type].getTracks().forEach(t => t.stop());
}

/* ===============================
   FILE UPLOAD
================================ */
function fileUp(e, type) {
    const reader = new FileReader();

    reader.onload = async () => {
        const compressed = await compressImage(reader.result);
        const url = await uploadToCloudinary(compressed);
        if (!url) return;

        document.getElementById(`input-${type}`).value = url;

        document.getElementById(`img-${type}`).src = compressed;
        document.getElementById(`img-${type}`).classList.remove('hidden');

        if (document.getElementById(`icon-${type}`))
            document.getElementById(`icon-${type}`).classList.add('hidden');
    };

    reader.readAsDataURL(e.target.files[0]);
}

/* ===============================
   SUBMIT FORM
================================ */
async function handleFormSubmit(e) {
    e.preventDefault();

    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerText = "SUBMITTING...";

    try {
        const response = await fetch('/public/admission/submit', {
            method: 'POST',
            body: new FormData(e.target),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        const res = await response.json();

        if (res.status) {
            alert("Application Submitted!");
            window.location.reload();
        } else {
            alert(res.message);
            btn.disabled = false;
            btn.innerText = "SUBMIT APPLICATION";
        }

    } catch (err) {
        alert("Server error");
        btn.disabled = false;
        btn.innerText = "SUBMIT APPLICATION";
    }
}

/* ===============================
   CLOUDINARY UPLOAD
================================ */
async function uploadToCloudinary(base64Image) {
    const formData = new FormData();
    formData.append("file", base64Image);
    formData.append("upload_preset", "admission_unsigned");

    const response = await fetch(
        "https://api.cloudinary.com/v1_1/dx5q7ht0x/image/upload",
        {
            method: "POST",
            body: formData
        }
    );

    const data = await response.json();

    if (!data.secure_url) {
        alert("Cloudinary upload failed");
        return null;
    }

    return data.secure_url;
}
</script>
</body>
</html>