<div class="overflow-x-auto" style="max-width: 100%; overflow-x: auto;">
    <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">
        <!-- head -->
        <thead style="background-color: #f2f2f2;">
            <tr>
                <th style="padding: 10px; text-align: left;">Mechanics Name</th>
                <th style="padding: 10px; text-align: left;">Car Model</th>
                <th style="padding: 10px; text-align: left;">Owners Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mechanic as $m)
                <tr>
                    <td style="padding: 10px; border-top: 1px solid #ddd;">{{ $m->name }}</td>
                    <td style="padding: 10px; border-top: 1px solid #ddd;">{{ $m->car->model  }}</td>
                    <td style="padding: 10px; border-top: 1px solid #ddd;">{{ $m->carOwner->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
