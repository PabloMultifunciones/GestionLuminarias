<div class="card mb-3">
                            
    <ul class="list-group list-group-flush">
                                
        <li class="list-group-item">Zona: {{ $task->zona }}</li>
        <li class="list-group-item">Calle: {{ $task->calle }}</li>
        <li class="list-group-item">Numero: {{ $task->numero }}</li>
        <li class="list-group-item">Descipcion: {{ $task->descripcion_problema }}</li>
        <li class="list-group-item text-center">
                                    
            <form action="{{ route('task.delete',$task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-success" value="Hecho">
            </form>
        </li> 
    </ul>
</div>