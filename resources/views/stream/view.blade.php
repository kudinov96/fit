@extends("layouts.layout-2")

@section("title", __("Тренер -  Поток"))

@section("content")
    <div id="main-content">
        <div class="container">
            <h1 class="stream-title">Поток от {{ $stream->start_date->format("d.m.y") }} <span>({{ $stream->status }})</span></h1>
            <div class="stream-add"><a data-bs-toggle="modal" data-bs-target="#memberModal" class="btn">+ Добавить участника</a></div>
            <div class="stream-table">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Имя, фамилия</th>
                            <th scope="col">Возраст</th>
                            <th scope="col">1 - ая неделя<br> чекин</th>
                            <th scope="col">2 - ая неделя<br> чекин</th>
                            <th scope="col">3 - ая неделя<br> чекин</th>
                            <th scope="col">4 - ая неделя<br> чекин</th>
                            <th scope="col">5 - ая неделя<br> чекин</th>
                            <th scope="col">6 - ая неделя<br> чекин</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="member-name">
                                        <a href="{{ route("user.view", ["user" => $user]) }}">{{ $user->name }}</a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteModal" data-user-id="{{ $user->id }}" class="remove remove-user"></a>
                                    </td>
                                    <td>{{ $user->age }}</td>
                                    <td><span @class(["s-plus" => $user->has_result_week_1, "s-minus" => !$user->has_result_week_1])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_2, "s-minus" => !$user->has_result_week_2])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_3, "s-minus" => !$user->has_result_week_3])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_4, "s-minus" => !$user->has_result_week_4])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_5, "s-minus" => !$user->has_result_week_5])></span></td>
                                    <td><span @class(["s-plus" => $user->has_result_week_6, "s-minus" => !$user->has_result_week_6])></span></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">Итого: {{ $users->count() }}</th>
                                <th scope="col"></th>
                                <th scope="col">Итого: {{ $countWeek1 }}</th>
                                <th scope="col">Итого: {{ $countWeek2 }}</th>
                                <th scope="col">Итого: {{ $countWeek3 }}</th>
                                <th scope="col">Итого: {{ $countWeek4 }}</th>
                                <th scope="col">Итого: {{ $countWeek5 }}</th>
                                <th scope="col">Итого: {{ $countWeek6 }}</th>
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
                    <div class="modal-title">Добавить участника</div>
                    <form class="needs-validation" method="POST" action="{{ route("user.store") }}" novalidate>
                        @csrf
                        @method("POST")

                        <input type="hidden" name="stream_id" value="{{ $stream->id }}">
                        <div class="form-item">
                            <label>Имя, Фамилия</label>
                            <input name="name" type="text" value="" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label>Email</label>
                            <input name="email" type="email" value="" class="form-control" required>
                        </div>
                        <div class="form-item">
                            <label>Номер телефона</label>
                            <input name="phone" type="tel" value="" class="form-control" required>
                        </div>
                        <div class="form-action">
                            <button type="submit" class="btn">Добавить</button>
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
                    <div class="modal-title">Участник добавлен</div>
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
                    <div class="modal-title">Вы действительно хотите удалить участника?</div>
                </div>
                <form id="delete-user-form" method="POST" action="{{ route("user.delete") }}">
                    @csrf
                    @method("DELETE")

                    <input type="hidden" name="user_id">
                    <input type="hidden" name="stream_id" value="{{ $stream->id }}">

                    <div class="modal-footer">
                        <button type="submit" class="btn">Да</button>
                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Нет</button>
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
                    <div class="modal-title">Участник удален</div>
                </div>
            </div>
        </div>
    </div>
@endsection
