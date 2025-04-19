@extends("layouts.layout-2")

@section("title", __("Тренер -  Поток"))

@section("content")
    <div id="main-content">
        <div class="container">
            @if($errors)
                <div class="mb-4">
                    @foreach($errors->all() as $error)
                        <div class="validation-error">
                            {{ __($error) }}
                        </div>
                    @endforeach
                </div>
            @endif
            <h1 class="stream-title">{{ $stream->title ? $stream->title . " -" : __('Поток от') }} {{ $stream->start_date->format("d.m.y") }} <span>({{ $stream->status }})</span></h1>
                <div class="stream-add-wrap">
                    <div class="stream-add"><a href="{{ route("stream.index") }}" class="btn">{{ __('Потоки') }}</a></div>
                    <div class="stream-add"><a href="{{ route("program.index") }}" class="btn">{{ __('Программы') }}</a></div>
                    <div class="stream-add"><a data-bs-toggle="modal" data-bs-target="#memberModal" class="btn">{{ __('+ Добавить участника') }}</a></div>
                    <div class="stream-add">
                        <a class="btn update-stream-modal"
                           data-id="{{ $stream->id }}"
                           data-title="{{ $stream->title }}"
                           data-date="{{ $stream->start_date->format("Y-m-d") }}"
                           data-chat="{{ $stream->group_chat }}"
                           data-program="{{ $stream->program_id }}"
                           data-template-for-start="{{ \Storage::url($stream->template_for_start) }}"
                           data-template-for-finish="{{ \Storage::url($stream->template_for_finish) }}"
                           data-template-info-book-lv="{{ \Storage::url($stream->template_info_book_lv) }}"
                           data-template-info-book-en="{{ \Storage::url($stream->template_info_book_en) }}"
                           data-template-info-book-ru="{{ \Storage::url($stream->template_info_book_ru) }}"
                           data-template-recipe-book-lv="{{ \Storage::url($stream->template_recipe_book_lv) }}"
                           data-template-recipe-book-en="{{ \Storage::url($stream->template_recipe_book_en) }}"
                           data-template-recipe-book-ru="{{ \Storage::url($stream->template_recipe_book_ru) }}"
                           data-template-access-to-gym="{{ $stream->access_to_gym }}"
                           data-template-access-to-home="{{ $stream->access_to_home }}"
                           data-template-access-to-meal-plan="{{ $stream->access_to_meal_plan }}"
                           data-template-access-to-results="{{ $stream->access_to_results }}"
                           data-template-access-to-check-in="{{ $stream->access_to_check_in }}"
                           data-bs-toggle="modal" data-bs-target="#editModal">{{ __('Редактировать') }}</a>
                    </div>
                </div>
            <div class="stream-table">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">{{ __('Имя, фамилия') }}</th>
                            <th scope="col">{{ __('Email') }}</th>
                            <th scope="col">{{ __('Анкета') }}</th>
                            <th scope="col">{{ __('1-ая неделя') }}<br> {{ __('чекин') }}</th>
                            <th scope="col">{{ __('2-ая неделя') }}<br> {{ __('чекин') }}</th>
                            <th scope="col">{{ __('3-яя неделя') }}<br> {{ __('чекин') }}</th>
                            <th scope="col">{{ __('4-ая неделя') }}<br> {{ __('чекин') }}</th>
                            <th scope="col">{{ __('5-ая неделя') }}<br> {{ __('чекин') }}</th>
                            <th scope="col">{{ __('6-ая неделя') }}<br> {{ __('чекин') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="member-name">
                                        <a href="{{ route("user.view", ["user" => $user]) }}">{{ $user->name }}</a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal" data-user-id="{{ $user->id }}" class="remove remove-user"></a>
                                    </td>
                                    <td><span style="font-size: 12px;">{{ $user->email }}</span></td>
                                    <td>
                                        @if($user->hasResultsByType(\App\Enums\ResultTypeEnum::START))
                                            <span class="s-plus s-plus_ping"></span>
                                        @endif
                                    </td>
                                    <td><span @class(["s-plus" => $user->has_result_week_1["has"], "s-plus_ping" => $user->has_result_week_1["is_answered"], "s-minus" => !$user->has_result_week_1["has"]])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_2["has"], "s-plus_ping" => $user->has_result_week_2["is_answered"], "s-minus" => !$user->has_result_week_2["has"]])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_3["has"], "s-plus_ping" => $user->has_result_week_3["is_answered"], "s-minus" => !$user->has_result_week_3["has"]])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_4["has"], "s-plus_ping" => $user->has_result_week_4["is_answered"], "s-minus" => !$user->has_result_week_4["has"]])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_5["has"], "s-plus_ping" => $user->has_result_week_5["is_answered"], "s-minus" => !$user->has_result_week_5["has"]])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_6["has"], "s-plus_ping" => $user->has_result_week_6["is_answered"], "s-minus" => !$user->has_result_week_6["has"]])></span></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">{{ __('Итого') }}: {{ $users->count() }}</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">{{ __('Итого') }}: {{ $countWeek1 }}</th>
                                <th scope="col">{{ __('Итого') }}: {{ $countWeek2 }}</th>
                                <th scope="col">{{ __('Итого') }}: {{ $countWeek3 }}</th>
                                <th scope="col">{{ __('Итого') }}: {{ $countWeek4 }}</th>
                                <th scope="col">{{ __('Итого') }}: {{ $countWeek5 }}</th>
                                <th scope="col">{{ __('Итого') }}: {{ $countWeek6 }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- new member modal  -->
    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Добавить участника') }}</div>
                    <form class="needs-validation" method="POST" action="{{ route("user.store") }}" novalidate>
                        @csrf
                        @method("POST")

                        <input type="hidden" name="stream_id" value="{{ $stream->id }}">
                        <div class="form-item">
                            <label>{{ __('Имя, Фамилия') }}</label>
                            <input name="name" type="text" value="" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label>{{ __('Email') }}</label>
                            <input name="email" type="email" value="" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label>{{ __('Номер телефона') }}</label>
                            <input name="phone" type="tel" value="" class="form-control">
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">{{ __('Добавить') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- success modal -->
    <div class="modal fade" id="thanksModal" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Участник добавлен') }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- remove modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Вы действительно хотите удалить участника?') }}</div>
                </div>
                <form id="delete-user-form" method="POST" action="{{ route("user.delete") }}">
                    @csrf
                    @method("DELETE")

                    <input type="hidden" name="user_id">
                    <input type="hidden" name="stream_id" value="{{ $stream->id }}">

                    <div class="modal-footer">
                        <button type="submit" class="btn">{{ __('Да') }}</button>
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">{{ __('Нет') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="thanks_deleteModal" tabindex="-1" aria-labelledby="thanks_deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-title">{{ __('Участник удален') }}</div>
                </div>
            </div>
        </div>
    </div>

    <x-stream-modal-edit :programs="$programs" :fromView="true"></x-stream-modal-edit>
@endsection

@section("scripts")
    <script>
        $(document).ready(function() {
            $('.file-upload').fileinput({
                showCaption: false,
                hideThumbnailContent: false,
                dropZoneEnabled: false,
                showPreview: true,
                showUploadedThumbs: true,
                showUpload: false,
                showZoom: false,
                browseLabel: '{{ __("Загрузить") }}',
                browseClass: 'btn btn-green',
                removeLabel: '{{ __("Удалить") }}',
                removeClass: 'd-none'
            });
        });
    </script>
@endsection
