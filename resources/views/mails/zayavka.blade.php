<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Application Details</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <table style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border-collapse: collapse; border: 1px solid #ccc;">
        <tr>
            <td style="background-color: #f0f0f0; text-align: center; padding: 20px;">
                <h2>New Application Details</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p><strong>User ID:</strong> {{ $newApply->user_id }}</p>
                <p><strong>Duration:</strong> {{ $newApply->duration }}</p>
                <p><strong>Beep:</strong> {{ $newApply->beep == 1 ? 'Yes' : 'No' }}</p>
                <p><strong>Name:</strong> {{ $newApply->name }}</p>
                <p><strong>Description:</strong> {{ $newApply->description }}</p>
                <p><strong>Contact:</strong> {{ $newApply->contact }}</p>
                <p><strong>File:</strong> <a href="{{ asset(str_replace('public', 'storage', $newApply->file)) }}">Download</a></p>
            </td>
        </tr>
    </table>

</body>
</html>
