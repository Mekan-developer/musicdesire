<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('order.subject') }}{{ $newOrder->id }}</title>
</head>

<body>
    <h2>{{ __('order.subject') }}{{ $newOrder->id }}</h2>
    <p>{{ __('order.hello') }}{{ $newOrder->name }}{{ __('order.hello_after') }}</p>
    <p>{{ __('order.paid_success') }}</p>
    <p>{{ __('order.details') }}</p>
    <table>
        <thead>
            <tr>
                <th align="left">{{ __('order.track_name') }}</th>
                <th align="left">{{ __('order.track_duration') }}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $getID3 = new getID3();
            @endphp
            @foreach ($newOrder->tracks as $newOrderItem)
                <tr>
                    @php
                        $track = $newOrderItem->trackObj;
                        $filePath = 'app/public/tracks/' . $track->full;
                        $file = $getID3->analyze(storage_path($filePath));
                        $track->duration = isset($file['playtime_seconds']) ? (float) $file['playtime_seconds'] : 0.0;
                    @endphp
                    <td>{{ $track->name_en ?? $track_name_ru }}</td>
                    <td> {{ gmdate('i:s', $track->duration) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>{{ __('order.thanks') }}</p>
    <p>{{ __('order.regards') }}</p>
    
    <p>{{ __('order.contacts') }}</p>
    <ul>
        <li><a href="https://wa.me/+79992035959">WhatsApp</a></li>
        <li><a href="https://vk.com/musicdesire">VK</a></li>
        <li><a href="https://www.instagram.com/panferovaleriya/">Instagram</a></li>
        <li><a href="https://t.me/panferovaleriya">Telegram</a></li>
    </ul>
</body>

</html>
