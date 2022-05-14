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
                  action="{{ route('saveAdminGood', ['good_id' => isset($data['manage_good']) ? $data['manage_good']->id : '0']) }}">
                @csrf

                <table width="100%" border="1" cellspacing="0" cellpadding="3">
                    <tr>
                        <td width="250">
                            <strong>Категория</strong>
                        </td>
                        <td>
                            <select name="category_id" style="width:100%;">
                                @if ($data['categories'])
                                    @if (isset($data['manage_good']))
                                        @foreach ($data['categories'] as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $data['manage_good']->category_id == $category->id ? 'selected' : '' }}
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($data['categories'] as $category)
                                            <option value="{{ $category->id }}"
                                                {{ isset($data['category_id']) && $data['category_id'] == $category->id ? 'selected' : '' }}
                                            >{{ $category->title }}</option>
                                        @endforeach
                                    @endif
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            <strong>Название</strong>
                        </td>
                        <td>
                            <input type="text" name="title" style="width:100%;" value="{{ isset($data['manage_good']) ? $data['manage_good']->title : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            <strong>Описание</strong>
                        </td>
                        <td>
                            <textarea name="description" style="width:100%;" rows="3">{{ isset($data['manage_good']) ? $data['manage_good']->description : '' }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            <strong>Цена</strong>
                        </td>
                        <td>
                            <input type="text" name="cost" style="width:100%;" value="{{ isset($data['manage_good']) ? $data['manage_good']->cost : '' }}">
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            <strong>Изображение</strong>
                        </td>
                        <td>
                            <input type="file" name="image">

                            @if (isset($data['manage_good']) && $data['manage_good']->image_url)
                                <img src="{{ $data['manage_good']->image_url }}">
                            @endif

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
