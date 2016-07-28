@if(!$task->finished() && $task->isMultipleChoice())
    <div id="modal" class="modal fade">
        <div class="modal-dialog modal-sm">
            <form method="POST" action="/task/{{ $task->id }}/finish" class="modal-content">
                {{ csrf_field() }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Aufgabe lösen</h4>
                </div>

                <div style="padding: 5px">
                    @foreach($task->answers as $answer)
                        <div class="radio">
                            <label>
                                <input type="radio" name="answer_id" id="answer_{{ $answer->id }}"
                                       value="{{ $answer->id }}">
                                {{ $answer->label }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
                    <button type="submit" class="btn btn-primary">Antwort abgeben</button>
                </div>
            </form>
        </div>
    </div>
@endif