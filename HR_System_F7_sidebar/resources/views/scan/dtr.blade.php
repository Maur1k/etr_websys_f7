@extends('layouts.app')

@section('title', 'Monthly Attendance Summary')

@section('content')
    <a href="{{ route('employees.index') }}" class="back-btn">Back to Employees</a>

    <h2>Monthly Report on Undertime and Absences</h2>

    <p class="header">
        For the Month of: {{
        \Carbon\Carbon::createFromDate(
            now()->year,
            request('month', 4),
            1
        )->format('F Y')
            }}
    </p>

    <form action="{{ route('attendance.report') }}" method="GET">
        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="">All</option>
            <option value="Instructional" {{ request('role') == 'Instructional' ? 'selected' : '' }}>Instructional</option>
            <option value="Non-Instructional" {{ request('role') == 'Non-Instructional' ? 'selected' : '' }}>Non-Instructional
            </option>
        </select>

        <label for="month">Month:</label>
        <select name="month" id="month">
            @foreach(range(1, 12) as $m)
                <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                    {{ \Carbon\Carbon::createFromDate(now()->year, $m, 1)->format('F') }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
        <a href="#" class="pagination-btn btn-download">Download</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Undertime</th>
                <th>Absences</th>
                <th>Individual Info</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $i => $r)
                <tr>
                    <td>{{ ($records->currentPage() - 1) * $records->perPage() + $i + 1 }}</td>
                    <td>{{ $r['name'] }}</td>
                    <td>{{ $r['undertime'] ?: '' }}</td>
                    <td>{{ $r['absences'] ?? '' }}</td>
                    <td><a href="#" class="pagination-btn btn-download">Show Data</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        @if ($records->onFirstPage())
            <span class="pagination-btn disabled">First</span>
            <span class="pagination-btn disabled">Previous</span>
        @else
            <a href="{{ $records->url(1) }}" class="pagination-btn">First</a>
            <a href="{{ $records->previousPageUrl() }}" class="pagination-btn">Previous</a>
        @endif

        @foreach ($records->getUrlRange(max(1, $records->currentPage() - 2), min($records->lastPage(), $records->currentPage() + 2)) as $page => $url)
            <a href="{{ $url }}" class="pagination-btn {{ $records->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
        @endforeach

        @if ($records->hasMorePages())
            <a href="{{ $records->nextPageUrl() }}" class="pagination-btn">Next</a>
            <a href="{{ $records->url($records->lastPage()) }}" class="pagination-btn">Last</a>
        @else
            <span class="pagination-btn disabled">Next</span>
            <span class="pagination-btn disabled">Last</span>
        @endif
    </div>
@endsection