@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.campaigns.show', $campaign->id) }}" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Campaign
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <div class="flex items-start justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">Edit History</h1>
                <p class="text-gray-600">{{ $campaign->title }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-600">Campaign by</p>
                <p class="font-semibold text-gray-900">{{ $campaign->user->name }}</p>
            </div>
        </div>
    </div>

    @if($campaign->editLogs && $campaign->editLogs->count() > 0)
        <div class="space-y-4">
            @php
                $groupedLogs = $campaign->editLogs->groupBy(function($log) {
                    return $log->created_at->format('Y-m-d H:i:s');
                });
            @endphp

            @foreach($groupedLogs as $timestamp => $logs)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-200">
                        <div>
                            <p class="text-lg font-bold text-gray-900">
                                {{ \Carbon\Carbon::parse($timestamp)->format('F d, Y') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($timestamp)->format('h:i A') }}
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Edited by</p>
                            <p class="font-semibold text-gray-900">{{ $logs->first()->user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $logs->first()->user->email }}</p>
                        </div>
                    </div>

                    @if($logs->first()->edit_reason)
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-yellow-800 mb-1">Reason for Edit:</p>
                                    <p class="text-sm text-gray-700">{{ $logs->first()->edit_reason }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-3">
                        <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Changes Made:</h3>
                        @foreach($logs as $log)
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    <p class="text-sm font-semibold text-gray-700">{{ ucfirst(str_replace('_', ' ', $log->field_name)) }}</p>
                                </div>

                                <div class="space-y-2">
                                    <div class="bg-red-50 border-l-4 border-red-400 p-3 rounded">
                                        <p class="text-xs font-semibold text-red-700 mb-1">Previous Value:</p>
                                        <p class="text-sm text-gray-800 break-words">{{ $log->old_value ?: '(empty)' }}</p>
                                    </div>

                                    <div class="flex justify-center">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                        </svg>
                                    </div>

                                    <div class="bg-green-50 border-l-4 border-green-400 p-3 rounded">
                                        <p class="text-xs font-semibold text-green-700 mb-1">New Value:</p>
                                        <p class="text-sm text-gray-800 break-words">{{ $log->new_value ?: '(empty)' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <p class="text-xs text-gray-500">
                            {{ $logs->count() }} {{ Str::plural('field', $logs->count()) }} modified
                            &bull; {{ \Carbon\Carbon::parse($timestamp)->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">No Edit History</h3>
            <p class="text-gray-600">This campaign has not been edited yet.</p>
        </div>
    @endif
</div>
@endsection
