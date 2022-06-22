@include("layouts.header")
<div class="container">
    <h2><b>Buscador de Libros</b></h2>
    <h5><b>Categorías:</b></h5>

    <select class="form-select" name="id" id="id" aria-label="Default select example" onchange="getBooks()">
        <option selected></option>
        @foreach ($categoryes as $category)

        <option value="{{$category['category_id']}}">
            {{$category['name']}}
        </option>
        @endforeach
    </select>

    <div class="row">
        @foreach ($books as $key => $book)
        <div class="col-sm-4 py-3 py-sm-0">
            <div class="card box-shadow mt-4">
                <a data-toggle="modal" data-target="#ver{{$book['ID']}}" href="#ver{{$book['ID']}}"><img
                        src="{{$book['cover']}}" class="card-img-top" alt="..."></a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ver{{$book['ID']}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Información del libro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Título: {{$book['title']}}</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Autor: {{$book['author']}}</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Contenido corto:
                                {{$book['content_short']}}</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Año de publicación:
                                {{$book['publisher_date']}}</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Páginas: {{$book['pages']}}</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Lenguaje: {{$book['language']}}</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
<script>
    function getBooks(){
       let id= document.getElementById("id").value;
       window.location.href="/books/category/"+id;
    }
</script>
@include("layouts.footer")