<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLMS Price Calculator - Active Asset Billing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type="number"] {
            -moz-appearance: textfield;
            text-align: right;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen p-4 sm:p-8">

    <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-xl overflow-hidden">
        
        <!-- Header -->
        <header class="bg-indigo-700 text-white p-6 sm:p-8">
            <h1 class="text-2xl sm:text-3xl font-extrabold mb-1">CLMS – Active Asset Billing & Payment</h1>
            <p class="text-indigo-200 text-lg">Calculate your estimated Monthly Active Asset Billing (AAB) based on your current usage.</p>
        </header>
<div>
    <a href="{{ Route('employerDashboard') }}">Click here to back.!</a>
</div>
        <!-- Main Content Grid -->
        <div class="p-4 sm:p-8 lg:grid lg:grid-cols-12 lg:gap-8">

            <!-- Column 1: Input Fields -->
            <div class="lg:col-span-4 space-y-4 p-4 border rounded-xl bg-gray-50 shadow-inner">
                <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Input Current Active Assets</h2>

                <div class="space-y-3" id="input-fields">
                    <!-- Input fields dynamically read/updated -->
                    <!-- Learner Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Learners (e.g. 400)</label>
                    <input type="number" id="learners" value="{{$activeLearners}}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150" readonly>

                    <!-- Instructor Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Instructors (e.g. 10)</label>
                    <input type="number" id="instructors" value="{{$instructorsCount}}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">

                    <!-- Branch Executive Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Branch Executives (e.g. 1)</label>
                    <input type="number" id="branchExecutives" value="{{$branchExecutivesCount}}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    
                    <!-- Employer Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Employers (limit only 1)</label>
                    <input type="number" id="employers" value="1" min="0" max="1" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">

                    <!-- Branch Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Branches (e.g. 1)</label>
                    <input type="number" id="branches" value="{{$activeBranches}}" min="1" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                    
                    <!-- Program Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Programs (e.g. 30)</label>
                    <input type="number" id="programs" value="{{$activePrograms}}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">

                    <!-- Course Input -->
                    <label class="block text-sm font-medium text-gray-700">Total Courses (e.g. 210)</label>
                    <input type="number" id="courses" value="{{$activeCourses}}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">

                    <!-- Transactions Input -->
                    <label class="block text-sm font-medium text-gray-700">Payment Transactions (Estimate per month, e.g. 400)</label>
                    <input type="number" id="transactions" value="{{$totalPaymentTransactions}}" min="0" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                </div>
            </div>

            <!-- Column 2: Calculation and Clarification -->
            <div class="lg:col-span-8 mt-8 lg:mt-0 space-y-6">

                <!-- Calculation Table -->
                <div class="overflow-x-auto shadow-lg rounded-xl">
                    <table class="min-w-full bg-white divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                                <th class="py-3 px-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Units</th>
                                <th class="py-3 px-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Rate (₹)</th>
                                <th class="py-3 px-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount (₹)</th>
                            </tr>
                        </thead>
                        <tbody id="billing-details" class="divide-y divide-gray-100">
                            <!-- Rows populated by JavaScript -->
                        </tbody>
                        <tfoot>
                            <tr class="bg-indigo-50 font-extrabold text-indigo-800 border-t-2 border-indigo-700">
                                <td colspan="3" class="py-3 px-4 text-right text-sm sm:text-lg">Total Monthly Bill (₹)</td>
                                <td id="total-bill" class="py-3 px-4 text-right text-sm sm:text-lg">0</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Billing Clarification -->
                <div class="p-6 bg-indigo-50 rounded-xl shadow-md space-y-3">
                    <h2 class="text-xl font-bold text-indigo-700">Billing Clarification:</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                        <li><b>Application Access & Active Charges:</b> ₹1000/month (fixed).</li>
                        <li><b>Billing is generated</b> on the <b>27th</b> of every month based on active asset usage.</li>
                        <li><b>Payment window:</b> 28th to 4th of next month.</li>
                        <li><b>Late payment after 4th</b> attracts <b>5% penalty</b> on the total Active Asset Billing (AAB).</li>
                        <li><b>Active Asset Billing (AAB):</b> Calculated per month based on current active usage.</li>
                        <li><b>Pending dues</b> must be cleared before current month payments to avoid recurring penalties.</li>
                        <li class="font-bold text-red-600"><b>User Profile Clarification:</b> The <b>₹5 User Profile</b> rate is a separate fee applied to every specialized profile (Learner, Instructor, etc.) as an access and setup fee.</li>
<li class="font-bold text-red-600"><b>NOTE: Your total monthly bill is variable and depends entirely on your overall active asset usage (the number of units consumed). The unit rates themselves (e.g., ₹20 per Learner, ₹150 per Branch) are fixed for transparency and budget stability.</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Unit Rates based on the user's final list
        const RATES = {
            ApplicationFixed: 1000,
            UserProfiles: 5,
            Learners: 20,
            Instructors: 50,
            BranchExecutives: 40,
            Employers: 30,
            Branches: 150,
            Programs: 20,
            Courses: 5,
            PaymentTransactions: 2,
            InstitutionalProfile: 50, // Added based on earlier list, assumed fixed 1 unit
            EmployerProfile: 50,     // Added based on earlier list, assumed fixed 1 unit
        };

        function formatCurrency(amount) {
            return amount.toLocaleString('en-IN', { style: 'currency', currency: 'INR', minimumFractionDigits: 0 });
        }

        function calculateBill() {
            // 1. Get Input Values
            const learners = parseInt(document.getElementById('learners').value) || 0;
            const instructors = parseInt(document.getElementById('instructors').value) || 0;
            const branchExecutives = parseInt(document.getElementById('branchExecutives').value) || 0;
            const employers = parseInt(document.getElementById('employers').value) || 0;
            const branches = parseInt(document.getElementById('branches').value) || 0;
            const programs = parseInt(document.getElementById('programs').value) || 0;
            const courses = parseInt(document.getElementById('courses').value) || 0;
            const transactions = parseInt(document.getElementById('transactions').value) || 0;
            
            // Limit employer input to 1
            if (employers > 1) document.getElementById('employers').value = 1;

            // 2. Calculate Derived Units
            // As per user's example, "User Profile" is the sum of all specialized users.
            const totalUserProfiles = learners + instructors + branchExecutives + employers;

            // Assuming Institutional Profile and Employer Profile are fixed fees for the system setup (1 unit each)
            const institutionalProfileUnits = 1; 
            const employerProfileUnits = 1;

            // 3. Calculate Amounts
            const calculations = [
                { desc: "Application Access & Active Charges (Fixed)", units: 1, rate: RATES.ApplicationFixed, amount: RATES.ApplicationFixed },
                { desc: "Institutional Profile (Infra)", units: institutionalProfileUnits, rate: RATES.InstitutionalProfile, amount: institutionalProfileUnits * RATES.InstitutionalProfile },
                { desc: "Employer Profile (Infra)", units: employerProfileUnits, rate: RATES.EmployerProfile, amount: employerProfileUnits * RATES.EmployerProfile },
                { desc: "Branches", units: branches, rate: RATES.Branches, amount: branches * RATES.Branches },
                { desc: "Programs", units: programs, rate: RATES.Programs, amount: programs * RATES.Programs },
                { desc: "Courses", units: courses, rate: RATES.Courses, amount: courses * RATES.Courses },
                { desc: "User Profiles (Access & Setup Fee)", units: totalUserProfiles, rate: RATES.UserProfiles, amount: totalUserProfiles * RATES.UserProfiles },
                { desc: "Learners (Core Usage)", units: learners, rate: RATES.Learners, amount: learners * RATES.Learners },
                { desc: "Instructors (Core Usage)", units: instructors, rate: RATES.Instructors, amount: instructors * RATES.Instructors },
                { desc: "Branch Executives (Core Usage)", units: branchExecutives, rate: RATES.BranchExecutives, amount: branchExecutives * RATES.BranchExecutives },
                { desc: "Employers (Core Usage)", units: employers, rate: RATES.Employers, amount: employers * RATES.Employers },
                { desc: "Payment Transactions", units: transactions, rate: RATES.PaymentTransactions, amount: transactions * RATES.PaymentTransactions },
            ];

            // 4. Render Table
            const tableBody = document.getElementById('billing-details');
            tableBody.innerHTML = '';
            let totalBill = 0;

            calculations.forEach(item => {
                totalBill += item.amount;
                const row = `
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-2 px-4 text-sm font-medium text-gray-700">${item.desc}</td>
                        <td class="py-2 px-4 text-center text-sm font-medium text-gray-700">${item.units}</td>
                        <td class="py-2 px-4 text-right text-sm font-medium text-gray-700">${formatCurrency(item.rate)}</td>
                        <td class="py-2 px-4 text-right text-sm font-medium text-gray-900">${formatCurrency(item.amount)}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            // 5. Render Total
            document.getElementById('total-bill').textContent = formatCurrency(totalBill);
        }

        // Add event listeners to all input fields
        document.addEventListener('DOMContentLoaded', () => {
            const inputs = document.querySelectorAll('#input-fields input');
            inputs.forEach(input => {
                input.addEventListener('input', calculateBill);
            });
            // Run on load with default values
            calculateBill(); 
        });
    </script>
</body>
    <!-- Footer -->
    <footer class="mt-8 text-center text-sm text-gray-500 py-4">
        <p>
            Developed &amp; Maintained by 
            <span class="font-semibold text-gray-700">MNBSolutions</span> — 
            <span class="font-medium">All Rights Reserved</span>
        </p>
    </footer>

</html>