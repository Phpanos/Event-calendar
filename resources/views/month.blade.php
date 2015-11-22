<table>
<tr>
    @foreach($weekDays as $dayInWeek)
        <th>{{ $dayInWeek }}</th>
    @endforeach
</tr>

@foreach($weeks as $week)
    <tr>
        @foreach($week as $w => $day)
            <td>{{ $day }}</td>
        @endforeach
    </tr>
@endforeach
</table>