<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Action Required | Learner Enrollment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Optional: If CoreUI / Bootstrap already loaded, this will auto-adapt --}}
    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: linear-gradient(135deg, #f4f6f9, #e9edf3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-card {
            background: #ffffff;
            max-width: 520px;
            width: 100%;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .info-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            border-radius: 50%;
            background: #eef2ff;
            color: #3b5bfd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 700;
        }

        .info-title {
            font-size: 22px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .info-text {
            font-size: 14.5px;
            color: #6b7280;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .action-form {
            margin-top: 10px;
        }

        .action-btn {
            display: inline-block;
            width: 100%;
            padding: 12px 16px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            background: #3b5bfd;
            color: #ffffff;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .action-btn:hover {
            background: #2f4ae0;
            box-shadow: 0 6px 16px rgba(59, 91, 253, 0.25);
        }

        .helper-text {
            margin-top: 14px;
            font-size: 12.5px;
            color: #9ca3af;
        }
    </style>
</head>
<body>

    <div class="info-card">
        <div class="info-icon">!</div>

        <div class="info-title">
            Learner Enrollment Required
        </div>

        <div class="info-text">
            No learner details are currently available.  
            To continue with the process, please initiate a new learner enrollment.
            This ensures accurate records and smooth workflow across the system.
        </div>

        <form class="action-form" method="GET" action="{{ route('learnerNewEnrollment') }}">
            <button type="submit" class="action-btn">
                Start New Learner Enrollment
            </button>
        </form>

        <div class="helper-text">
            If you believe this is an error, please contact system administration.
        </div>
    </div>

</body>
</html>
