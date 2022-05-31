<?php
    require_once './models/Book.php';

    class BookController extends BaseAuthController
    {
        public function index()
        {
            $this->loginFilter();
            $books = Book::all();
            //mostrar a vista index passando os dados por parâmetro
            $this->renderView('book/index', ['books' =>$books]);
        }

        public function show($id)
        {
            $this->loginFilter();
            $book = Book::find([$id]);
            if (is_null($book)) {
                //TODO redirect to standard error page
            } else {
                $this->renderView('book/show', ['book' =>$book]);
            }
        }

        public function create()
        {
            $this->loginFilter();

            $genres = Genre::all();
            $this->renderView('book/create', ['genres' =>$genres]);



        }

        public function store()
        {
            $genres = Genre::all();
            if(($_POST['name'] !== " " && $_POST['isbn'] !== " "))
            {
                //create new resource (activerecord/model) instance with data from POST
                //your form name fields must match the ones of the table fields
                $book = new Book($_POST);
                if($book->is_valid()){
                    $book->save();
                    $this->redirectToRoute('book', 'index');
                } else {
                    //mostrar vista create passando o modelo como parâmetro
                    $this->renderView('book/create', ['book' =>$book,'genres' =>$genres]);
                }
            }
            else
            {
                $this->renderView('book/create', ['genres' =>$genres]);
            }

        }

        public function edit($id)
        {
            $book = Book::find([$id]);
            $genres = Genre::all();
            if (is_null($book)) {
                //TODO redirect to standard error page
            } else {
                $this->renderView('book/edit', ['book' =>$book,'genres' =>$genres]);
            }
        }

        public function update($id)
        {

            $genres = Genre::all();
            if(($_POST['name'] !== " " && $_POST['isbn'] !== " "))
            {
                //find resource (activerecord/model) instance where PK = $id
                //your form name fields must match the ones of the table fields
                $book = Book::find([$id]);
                $book->update_attributes($_POST);
                if($book->is_valid()){
                    $book->save();
                    $this->redirectToRoute('book', 'index');
                } else {
                    $this->renderView('book/edit', ['book' =>$book,'genres' =>$genres]);
                }
            }
            else
            {
                $book = Book::find([$id]);
                $this->renderView('book/edit', ['book' =>$book,'genres' =>$genres]);
            }
        }

        public function delete($id)
        {
            $book = Book::find([$id]);
            $book->delete();
            $this->redirectToRoute('book', 'index');
        }
    }