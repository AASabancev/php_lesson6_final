@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        <div class="content-middle">

            <h2>{{ $data['page_title'] }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger"  style="color:red;">
                    <b>ОШИБКА!</b>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" enctype="multipart/form-data"
                  action="{{ route('saveAdminCategory', ['category_id' => isset($data['manage_category']) ? $data['manage_category']->id : '0']) }}">
                @csrf
                <table width="100%" border="1" cellspacing="0" cellpadding="3">
                    <tr>
                        <td width="250">
                            <strong>Название</strong>
                        </td>
                        <td>
                            <input type="text" name="title" style="width:100%;" value="{{ isset($data['manage_category']) ? $data['manage_category']->title : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            <strong>Описание</strong>
                        </td>
                        <td>
                            <textarea name="description" style="width:100%;" rows="3">{{ isset($data['manage_category']) ? $data['manage_category']->description : '' }}</textarea>
                        </td>
                    </tr>
                </table>
                <br>
                <button type="submit">Сохранить</button>
            </form>

        </div>
        <div class="content-bottom"></div>
    </div>
</div>

@include('site.footer')
