
@extends('layouts.dashboard')
@section('title', __('Edit - ') . ($team->title))
@section('content')
    <div class="card bg-white dark:bg-dark-eval-1">
        <div class="p-6 rounded-t rounded-r mb-0 border-b border-slate-200">
            <div class="card-header-container flex flex-wrap">
                <h6 class="text-xl font-bold text-zinc700 dark:text-zinc300">
                     {{ __('About') }} - 
                    {{ $team->name }}
                </h6>
            </div>
        </div>
        <div class="p-4">
            @livewire('admin.team.edit', [$team])
        </div>
    </div>
@endsection

