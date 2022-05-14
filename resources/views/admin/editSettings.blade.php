@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        <div class="content-middle">

            <h2>{{ $data['page_title'] }}</h2>

            <form method="post" action="{{ route('saveAdminSettings') }}">
                @csrf
                <table width="100%" border="1" cellspacing="0" cellpadding="3">
                    @php
                    $i =0;
                    @endphp
                    @foreach( $data['manage_settings'] as $setting )
                        <tr>
                            <td width="30">{{ ++$i }}</td>
                            <td width="250">
                                <strong>{{ $setting->title }}</strong>
                                <div>
                                    <i>{{ $setting->key }}</i>
                                </div>
                            </td>
                            <td>
                                <textarea name="{{ $setting->key }}" style="width:100%;" rows="3">{{ $setting->value }}</textarea>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <br>
                <button type="submit">Сохранить</button>
            </form>

        </div>
        <div class="content-bottom"></div>
    </div>
</div>

@include('site.footer')
