@extends("admin.layouts.app")
@section("title", __("admin.tickets.title"))
@section("content")

<div class="page-header">
    <h1>{{ __('admin.tickets.title') }}</h1>
</div>

<!-- Status Filter Tabs -->
<div style="margin-bottom:16px;border-bottom:1px solid #ddd;display:flex;gap:0;flex-wrap:wrap;">
    @foreach([
        "" => __('admin.tickets.status_all', '全部'),
        "open" => __('admin.tickets.status_open', '开启'),
        "answered" => __('admin.tickets.status_answered', '已回复'),
        "customer-reply" => __('admin.tickets.status_customer_reply', '客户已回复'),
        "closed" => __('admin.tickets.status_closed', '已关闭'),
        "on hold" => __('admin.tickets.status_on_hold', '搁置中')
    ] as $val => $label)
    @php $isActive = (request("status","") == $val); @endphp
    <a href="{{ route("admin.tickets.index", ["status" => $val]) }}"
       style="display:inline-block;padding:8px 16px;font-size:13px;text-decoration:none;color:{{ $isActive ? "#1a4d80" : "#666" }};font-weight:{{ $isActive ? "700" : "400" }};border-bottom:{{ $isActive ? "3px solid #1a4d80" : "3px solid transparent" }};margin-bottom:-1px;">
        {{ $label }}
    </a>
    @endforeach
</div>

<!-- Table -->
<div class="card">
    <table class="data-table">
        <thead>
            <tr>
                <th>{{ __('admin.tickets.ticket_num') }}</th>
                <th>{{ __('common.table.department') }}</th>
                <th>{{ __('common.table.subject') }}</th>
                <th>{{ __('common.table.client') }}</th>
                <th>{{ __('common.table.priority') }}</th>
                <th>{{ __('common.table.status') }}</th>
                <th>{{ __('common.table.last_reply') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $ticket)
            @php
            $statusBadge = match(strtolower($ticket->status ?? "")) {
                "open"            => "badge-open",
                "answered"        => "badge-answered",
                "customer-reply"  => "badge-customer-reply",
                "closed"          => "badge-terminated",
                "on hold"         => "badge-suspended",
                "in progress"     => "badge-pending",
                default           => "badge-cancelled",
            };
            $priorityBadge = match(strtolower($ticket->priority ?? "")) {
                "high", "critical" => "badge-terminated",
                "medium"           => "badge-pending",
                "low"              => "badge-active",
                default            => "badge-cancelled",
            };
            @endphp
            <tr>
                <td><a href="{{ route("admin.tickets.show", $ticket) }}" style="color:#337ab7;text-decoration:none;font-family:monospace;">#{{ $ticket->tid }}</a></td>
                <td style="color:#666;">{{ $ticket->department->name ?? "N/A" }}</td>
                <td><a href="{{ route("admin.tickets.show", $ticket) }}" style="color:#337ab7;text-decoration:none;font-weight:500;">{{ Str::limit($ticket->title, 55) }}</a></td>
                <td>{{ $ticket->client?->full_name ?? $ticket->name ?? $ticket->email }}</td>
                <td><span class="badge {{ $priorityBadge }}">{{ __('admin.tickets.priority_' . strtolower($ticket->priority ?? ''), ucfirst($ticket->priority ?? '')) }}</span></td>
                <td><span class="badge {{ $statusBadge }}">{{ __('admin.tickets.status_' . str_replace([' ', '-'], '_', strtolower($ticket->status ?? '')), ucfirst($ticket->status ?? '')) }}</span></td>
                <td style="color:#666;font-size:12px;">{{ $ticket->last_reply?->diffForHumans() ?? "-" }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align:center;padding:32px;color:#999;">{{ __('admin.tickets.no_tickets') }}</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div style="padding:10px 16px;border-top:1px solid #e5e7eb;">
        {{ $tickets->withQueryString()->links() }}
    </div>
</div>

@endsection
