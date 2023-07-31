            <!-- cara menyambungkan dengan class induk/ main -->
            @extends('layouts.main')
        <!-- memberitahu kalo ini adalah sebuah section yang bernama container -->
        @section('container')

        <div class="col-9">
        <div class="row mt-4">
                <div class="col-12">
                <div class="card" style="height: 950px; width: 800px">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Brownies</a></div>
                        <img src="../img/b1.jpg" style="height: 780px; width: 800px" class="card-img-top" alt="...">

                        <div class="card-body">
                                <div class="card-title"><h4>Brownies Cokelat toping strawberry</h4></div>
                                Brownies Coklat dengan toping strawberry yang segar
                        </div>

                        <div class="card-footer">
                                <a href="/detail/brownies" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                </div>
                </div>
                
        </div>

        <div class="row mt-4">
                <div class="col-12">
                <div class="card" style="height: 950px; width: 800px">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Brownies</a></div>
                        <img src="../img/browniesCokelat.jpg" style="height: 780px; width: 800px" class="card-img-top" alt="...">

                        <div class="card-body">
                                <div class="card-title"><h4>Resep Brownies cokelat</h4></div>
                         Yuk intip resep brownies yang satu ini!
                        </div>

                        <div class="card-footer">
                                <a href="/detail/brownies" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                </div>
                </div>
                
        </div>

        <div class="row mt-4">
                <div class="col-12">
                <div class="card" style="height: 950px; width: 800px">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Brownies</a></div>
                        <img src="../img/b2.jpg" style="height: 780px; width: 800px" class="card-img-top" alt="...">

                        <div class="card-body">
                                <div class="card-title"><h4>Resep Brownies cokelat dengan toping buah</h4></div>
                                Yuk intip resep brownies yang satu ini!
                        </div>

                        <div class="card-footer">
                                <a href="/detail/brownies" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                </div>
                </div>
                
        </div>

        <div class="row mt-4">
                <div class="col-12">
                <div class="card" style="height: 950px; width: 800px">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0,0.7)"><a href="#" class="text-white text-decoration-none">Brownies</a></div>
                        <img src="../img/b3.jpg" style="height: 780px; width: 800px" class="card-img-top" alt="...">

                        <div class="card-body">
                                <div class="card-title"><h4>Resep brownies cokelat dengan topping oreo</h4></div>
                                Yuk intip resep brownies yang satu ini!
                        </div>

                        <div class="card-footer">
                                <a href="/detail/brownies" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                </div>
                </div>
                
        </div>
        </div>

        
        @endsection