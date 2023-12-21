@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="my-4">Lista dei progetti</h1>

            <table class="table">
                <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titolo</th>
                      <th>Url immagine</th>
                      <th>Slug</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($projects as $project)
                        <tr>
                          <td>{{ $project->id }}</td>
                          <td>
                              <a href="{{ route('admin.projects.show', $project->id) }}">{{$project->title}} </a>   
                          </td>
                          <td>{{ $project->thumb }}</td>
                          <td>{{ $project->slug }}</td>
                          <td class="">
                            <div class="d-flex gap-3">
  
                                {{-- Pulsante modifica --}}
                                <span><a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-primary">Modifica</a></span>
  
                                {{-- Modale --}}
                                <div class="index" id="modal-delete-{{ $project->id }}">
                                  <div class="delete-notification py-3 px-4">
                                      <p class="mb-5 border-bottom"><b>Sei sicuro di voler eliminare questo elemento?</b></p>
                                      <div class="d-flex justify-content-around">
                                        <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                                          @csrf
                                          @method('DELETE')
  
                                          {{-- Pulsante elimina --}}
                                          <input type="submit" value="Elimina" class="btn btn-danger">
                                        </form>
                                        
                                        {{-- Pulsante annulla --}}
                                        <span class="btn btn-primary" onclick="hideModal('{{ $project->id }}')">Annulla</span>
                                      </div>
                                  </div>
                                </div>
                              
                              <span class="btn btn-danger" onclick="deleteNotification('{{ $project->id }}')">Elimina</span>
                            </div>
                          </td>
                        </tr>
                    @empty
                        <tr>
                          <td colspan="4">
                            Nessun progetto trovato
                          </td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
  
                <div class="d-flex justify-content-center">
                  <span class="btn btn-primary"><a href="{{ route('admin.projects.create') }}" class="text-decoration-none text-light pb-4" >Aggiungi un progetto</a></span>
                </div>
          </div>
        </section>
        
        
  
<script>
  
    function deleteNotification(comicId) {
      const deleteMenu = document.getElementById('modal-delete-' + comicId);
      deleteMenu.classList.add("d-block");
    }
  
    function hideModal(comicId) {
      const deleteMenu = document.getElementById('modal-delete-' + comicId);
  
      deleteMenu.classList.remove('d-block');
    }
  
        
</script>
@endsection