@extends('master')

@section('content')

    <div class="row container"  >
        
        <div class="col col-xl-3 col-sm-6 mtop16">
            <div class="card bg-pink shadow one">
                <div class="card-body widget-style-2">
                    <div class="text-white media">
                        <div class="media-body align-self-center">
                            <a href="#">
                            <h2 class="my-0 text-white"><span data-plugin="counterup">10</span></h2>
                            <p class="mb-0">Total de Usuarios</p>
                            </a>
                        </div>
                        <i class="fas fa-users main-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col col-xl-3 col-sm-6 mtop16">
            <div class="card bg-pink shadow two">
                <div class="card-body widget-style-2">
                    <div class="text-white media">
                        <div class="media-body align-self-center">
                            <h2 class="my-0 text-white"><span data-plugin="counterup">25</span></h2>
                            <p class="mb-0 ">Productos</p>
                        </div> 
                        <i class="fas fa-briefcase main-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-xl-3 col-sm-6 mtop16">
            <div class="card bg-pink shadow three">
                <div class="card-body widget-style-2">
                    <div class="text-white media">
                        <div class="media-body align-self-center">
                            <h2 class="my-0 text-white"><span data-plugin="counterup">38</span></h2>
                            <p class="mb-0">Servicios</p>
                        </div>
                        <i class="fas fa-calendar-week main-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col col-xl-3 col-sm-6 mtop16">
            <div class="card bg-pink shadow four">
                <div class="card-body widget-style-2">
                    <div class="text-white media">
                        <div class="media-body align-self-center">
                            <h2 class="my-0 text-white"><span data-plugin="counterup">15</span></h2>
                            <p class="mb-0">Ventas</p>
                        </div>
                        <i class="fas fa-users main-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title">Dashboard</h2>
            </div>
            <div class="inside">
                <div class="row">

                    <div class="col-12 col-md-6"> <canvas id="myChart" style=" height:50vh; width:40vw"></canvas></div>
                    <div class="col-12 col-md-6"> <canvas id="myChart2" style=" height:50vh; width:40vw"></canvas></div>
                    <div class="col-12 col-md-6"> <canvas id="myChart3" style=" height:50vh; width:40vw"></canvas></div>

                </div>

            </div>
        </div>
    </div>

@stop

<script>
 document.addEventListener("DOMContentLoaded", function(event) {
    
    var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
            }
        });

        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
            }
        });

        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
            }
        });

});

</script>