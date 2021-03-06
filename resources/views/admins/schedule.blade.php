@extends('templates-dashboard.master')
@section('content')
<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
            <div class="input-group input-group-seamless ml-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
            </form>
            <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                    <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="nav-link-icon__wrapper">
                            <i class="material-icons">&#xE7F4;</i>
                            <span class="badge badge-pill badge-danger">2</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <div class="notification__icon-wrapper">
                                <div class="notification__icon">
                                    <i class="material-icons">&#xE6E1;</i>
                                </div>
                            </div>
                            <div class="notification__content">
                                <span class="notification__category">Analytics</span>
                                <p>Your website’s active users count increased by
                                    <span class="text-success text-semibold">28%</span> in the last week. Great job!</p>
                                </div>
                            </a>
                            <a class="dropdown-item" href="#">
                                <div class="notification__icon-wrapper">
                                    <div class="notification__icon">
                                        <i class="material-icons">&#xE8D1;</i>
                                    </div>
                                </div>
                                <div class="notification__content">
                                    <span class="notification__category">Sales</span>
                                    <p>Last week your store’s sales count decreased by
                                        <span class="text-danger text-semibold">5.52%</span>. It could have been worse!</p>
                                    </div>
                                </a>
                                <a class="dropdown-item notification__all text-center" href="#"> View all Notifications </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle mr-2" src="/dashboard/images/avatars/0.jpg" alt="User Avatar">
                                <span class="d-none d-md-inline-block">{{ $user_info->name }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small">
                                <a class="dropdown-item" href="user-profile-lite.html">
                                <i class="material-icons">&#xE7FD;</i> Profile</a>
                                <a class="dropdown-item" href="components-blog-posts.html">
                                <i class="material-icons">vertical_split</i> Blog Posts</a>
                                <a class="dropdown-item" href="add-new-post.html">
                                <i class="material-icons">note_add</i> Add New Post</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ url('/admin/logout') }}">
                                <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                            </div>
                        </li>
                    </ul>
                    <nav class="nav">
                        <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                            <i class="material-icons">&#xE5D2;</i>
                        </a>
                    </nav>
                </nav>
            </div>
            <!-- / .main-navbar -->
            <div class="main-content-container container-fluid px-4 card p-4 rounded-0">
                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Dashboard</span>
                    </div>
                </div>
                <!-- End Page Header -->
                <!-- Small Stats Blocks -->
                <div class="row">
                  <h3 class="text-muted ml-2">List of all schedules</h3>
                    <div class="container-fluid">
                       {{--  <a class="float-right border-0 rounded-0 text-black"  style="cursor:pointer;" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="material-icons" style="font-size : 2vw;">delete</i>
                         </a> --}}
                      <br>
                      <!-- <div class="collapse" id="collapseExample">
                          <div class="card card-body rounded-0">
                                <table class="table table-bordered" id="deleteTables">
                                   <thead>
                                    <tr>
                                        <th class="text-center">Time</th>
                                        <th class="text-center">Days</th>
                                        <th class="text-center">Room</th>
                                        <th class="text-center">Instructor</th>
                                        <th class="text-center">Block</th>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                       @foreach ($deleted_schedules as $deleted)
                                        <tr>
                                            <td class="text-center">{{ $deleted->start_time . ' - ' . $deleted->end_time }}</td>
                                            <td class="text-center">{{ $deleted->days }}</td>
                                            <td class="text-center">{{ $deleted->room}}</td>
                                            <td class="text-center">{{ $deleted->instructor }}</td>
                                            <td class="text-center">{{ $deleted->block }}</td>
                                            <td class="text-center">{{ $deleted->subject }}</td>
                                            <td class="text-center">
                                              <a class="btn btn-success text-white rounded-0"
                                             onclick="restoreSchedule({{ $deleted->id }})"><i class="material-icons">restore</i></a>
                                              <a class="btn btn-danger text-white rounded-0"
                                             onclick="permanentDeleteSchedule({{ $deleted->id }})"><i class="material-icons">delete</i></a>
                                         </td>
                                        </tr>
                                @endforeach
                                </tbody>
                                </table>
                          </div>
                                           </div> -->
                        <br>
                        <table id="tables" class="table table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Days</th>
                                    <th class="text-center">Room</th>
                                    <th class="text-center">Block</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                <tr>
                                    <td class="text-center">{{ $schedule->start_time . ' - ' .  $schedule->end_time }}</td>
                                    <td class="text-center">{{ $schedule->days }}</td>
                                    <td class="text-center">{{ $schedule->room }}</td>
                                    <td class="text-center">{{ $schedule->block }}</td>
                                    <td class="text-center">{{ $schedule->subject }}</td>
                                    <td class="text-center"><button class="btn btn-success rounded-0" onclick="displayEditSchedule({{ $schedule->id }})"><i class="material-icons">edit</i> EDIT</button>
                                    <button class="btn btn-danger rounded-0" onclick="displayDeleteModal({{ $schedule->id }})"> <i class="material-icons">delete</i> DELETE</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- START OF DELETE MODAL --}}
            <!-- Modal -->
            <div class="modal fade" id="deleteModal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document" >
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center">Are you sure you want to <span class="font-weight-bold text-danger">delete</span> this schedule?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="button" id="deleteSchedule" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END OF DELETE MODAL --}}
            {{-- MODAL START --}}
            <!-- Modal -->
            <div class="modal fade" id="editSchedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php
                            $start_time = [
                            '7:30 AM',
                            '8:00 AM',
                            '8:30 AM',
                            '9:00 AM',
                            '9:30 AM',
                            '10:00 AM',
                            '10:30 AM',
                            '11:00 AM',
                            '11:30 AM',
                            '12:00 PM',
                            '12:30 PM',
                            '1:00 PM',
                            '1:30 PM',
                            '2:00 PM',
                            '2:30 PM',
                            '3:00 PM',
                            '3:30 PM',
                            '4:00 PM',
                            '4:30 PM',
                            '5:00 PM',
                            '5:30 PM',
                            '6:00 PM',
                            ];
                            @endphp
                            @include('errors.error')
                            <form id="scheduleForm" autocomplete="off"  onsubmit="event.preventDefault(); submitSchedule()" method="POST">
                                @csrf
                                <div class="form">
                                    {{-- TIME --}}
                                    <input type="hidden" id="scheduleId">
                                    <label>Time : </label>
                                    <div class="row form-group">
                                        <select name="start_time" onchange="getTime(this)" id="startTime" class="form-control col-md-6">
                                            <option selected disabled>Start time</option>
                                            @foreach ($start_time as $time)
                                            <option  value="{{ $time }}">{{ $time }}</option>
                                            @endforeach
                                        </select>
                                        <select name="end_time" onchange="getTime(this)" id="endTime" class="form-control col-md-6">
                                            <option selected disabled>End time</option>
                                            @foreach ($start_time as $time)
                                            <option  value="{{ $time }}">{{ $time }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- DAYS --}}
                                    <label>Days : </label>
                                    <div class="form-group row">
                                        <select name="days" id="days" class="form-control col-md-12">
                                            <option selected disabled>Select Days</option>
                                            <option value="MWF" {{ (old('days') == 'MWF' ? "selected":"") }}>MWF</option>
                                            <option value="TTH" {{ (old('days') == 'TTH' ? "selected":"") }}>TTH</option>
                                            <option value="S" {{ (old('days') == 'S' ? "selected":"") }}>S</option>
                                        </select>
                                    </div>
                                    {{-- ROOM --}}
                                    <label>Rooms:</label>
                                    <div class="form-group row">
                                        <select name="room" id="room" class="form-control col-md-12">
                                            <option disabled selected>Select Room</option>
                                            @foreach ($rooms as $room)
                                            <option value="{{ $room->room_number }}"
                                                {{ (old('room') == $room->room_number ? "selected":"") }}
                                            >Room {{ $room->room_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <label>Instructors : </label>
                                    <div class="form-group row">
                                        <select name="instructor" id="instructor" class="form-control col-md-12">
                                            <option disabled selected>Select Instructor</option>
                                            @foreach ($instructors as $instructor)
                                            <option
                                                value="{{ ucwords($instructor->name) }}"
                                                {{ (old('instructor') == ucwords($instructor->name) ? "selected":"") }}
                                            >{{ ucwords($instructor->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}
                                    {{-- FIRST YEAR --}}
                                    <label>First yr. Subject : </label>
                                    <div class="form-group row">
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_1_1" class="form-control col-md-6">
                                            <option disabled selected>First semester</option>
                                            @foreach ($first_sem_first_year_subjects as $subjects)
                                            <option
                                                value="{{ $subjects->sub_description }}"
                                                {{ (old('subject') == $subjects->sub_description ? "selected":"") }}
                                                >
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select name="subject" onchange="clearOtherSelect(this)"  id="subject_1_2" class="form-control col-md-6">
                                            <option disabled selected>Second semester</option>
                                            @foreach ($second_sem_first_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- SECOND YEAR --}}
                                    <label>Second yr. Subject : &nbsp;</label>
                                    <div class="form-group row">
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_2_1" class="form-control col-md-6">
                                            <option disabled selected>First semester</option>
                                            @foreach ($first_sem_second_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_2_2" class="form-control col-md-6">
                                            <option disabled selected>Second semester</option>
                                            @foreach ($second_sem_second_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- THIRD YEAR --}}
                                    <label>Third year Subject :</label>
                                    <div class="form-group row">
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_3_1" class="form-control col-md-6">
                                            <option disabled selected>First semester</option>
                                            @foreach ($first_sem_third_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_3_2" class="form-control col-md-6">
                                            <option disabled selected>Second semester</option>
                                            @foreach ($second_sem_third_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_3" class="form-control col-md-12 mt-2">
                                            <option disabled selected>Third year Summer</option>
                                            @foreach ($third_year_summer as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- FOURTH YEAR --}}
                                    <label>Fourth year subject : </label>
                                    <div class="form-group row">
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_4_1" class="form-control col-md-6">
                                            <option disabled selected>First semester</option>
                                            @foreach ($first_sem_fourth_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <select name="subject" onchange="clearOtherSelect(this)" id="subject_4_2" class="form-control col-md-6">
                                            <option disabled selected>Second semester</option>
                                            @foreach ($second_sem_fourth_year_subjects as $subjects)
                                            <option value="{{ $subjects->sub_description }}">
                                                {{  $subjects->sub . ' - ' . ucwords($subjects->sub_description) }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="float-right">
                                            <button class="btn btn-success" type="reset">Reset</button>
                                            <button class="btn btn-primary" type="submit">Update Schedule</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- MODAL END --}}
                @endsection
