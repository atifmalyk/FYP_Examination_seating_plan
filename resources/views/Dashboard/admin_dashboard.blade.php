@include('components.header');
@include('components.sidebar');
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>

        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
            <h3>{{ count($buildings) }}</h3>
            <p>Buildings</p>
        </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
            <h3>{{ count($rooms) }}</h3>
            <p>Rooms</p>
        </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
            <h3>{{ count($students) }}</h3>
            <p>Students</p>
        </span>
            </li>
        </ul>





    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


{{--<script src="dashboard.js"></script>--}}
<script src="{{ asset('Js2/dashboard.js') }}"></script>

</body>
</html>
