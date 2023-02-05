@extends('layout')

{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
        <h1>タスクの一覧</h1>
        <table border="1">
        <tr>
            <th>タスク名
            <th>期限
            <th>重要度
            
@foreach ($completed_list as $task)
        <tr>
            <td>{{ $task->name }}
            <td>{{ $task->period }}
            <td>{{ $task->getPriorityString() }}
            <td><a href="{{ route('detail', ['task_id' => $task->id]) }}">詳細閲覧</a>
            <td><a href="{{ route('edit', ['task_id' => $task->id]) }}">編集</a>
            <form action="{{ route('complete', ['task_id' => $task->id]) }}" method="post"> @csrf <button onclick='return confirm("このタスクを「完了」にします。よろしいですか？");' >完了</button></form>
@endforeach