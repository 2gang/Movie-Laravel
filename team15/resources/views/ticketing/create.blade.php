@extends('main')
@section('content')
<style>
#container{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 1300px;

}

.movieContainer{
    margin: 20px 0px;
}

.showcase{
    background-color: #777;
    background: rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    display: flex;
    justify-content: center;
    margin: 16px 0;
    padding: 5px 10px;
}

.movieContainer select{
    margin: 10px;
    padding: 5px 15px 5px 15px;
    border-radius: 7px;
    appearance: none;
    border: 0;
}

.movieContainer select option{

   text-align: left;
}

li{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 10px;
}

.small{
    color: #777;
    margin-left: 2px;
}

.showcase .seat:hover{
    cursor: default;
    scale: 1;
}

.showcase .selectedSeat:hover{
    cursor: default;
    scale: 1;
}

.screen{
   background-color: #fff;
   margin: 25px;
   padding: 5px;
   width: 140px;
   height: 80px;
   transform: rotateX(-45deg);
   box-shadow: 0 3px 10px rgb(255 255 255 / 70%);
}

.seat{
    background-color: #444451;
    width: 15px;
    height: 12px;
    margin: 3px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    cursor: pointer;
}

.availableSeat{
    background-color: #444451;
    width: 15px;
    height: 12px;
    margin: 3px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    cursor: default;
}

.selectedSeatIcon{
    background-color: #6feaf6;
    width: 15px;
    height: 12px;
    margin: 3px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    cursor: default;
}

.seat:hover{
    scale: 1.2;
}

.selectedSeat:hover{
    scale: 1.2;
}

.seat:nth-of-type(2){
    margin-right: 18px;
}

.seat:nth-of-type(7){
    margin-left: 18px;
}

.occupiedSeat:nth-of-type(2){
    margin-right: 18px;
}
.occupiedSeat:nth-of-type(7){
    margin-left: 18px;
}

.selectedSeat{
    background-color: #6feaf6;
    width: 15px;
    height: 12px;
    margin: 3px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    cursor: pointer;
}

.occupiedSeat{
    background-color: #fff;
    width: 15px;
    height: 12px;
    margin: 3px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.row{
    display: flex;
}

.text{
    margin-top: 30px;
    padding: 20px;
}

#count{
    color: #6feaf6;
}

#costs{
    color: #6feaf6;
}
</style>
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>로그인</h3>
        <form method="post" action="{{ url('home/check') }}">
		@csrf
        	<div class="row">
        		 <label for="username">
                    아이디:
                    <input type="text" name="uid" id="username" placeholder="아이디를 입력해주세요" required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    비밀번호:
                    <input type="password" name="pwd" id="password" placeholder="비밀번호를 입력해주세요" required="required" />
                </label>
            </div>
           
           <div class="row">
           	 <button type="submit" >로그인</button>
           </div>
        </form>
        
    </div>
</div>
<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>빠른 예매 하기</h1>
			
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single movie-single movie_single">
	    <div id="container">
        <ul class="showcase">
            <li>
                <div class="availableSeat"></div>
                <small class="small">선택 가능 좌석</small>
            </li>
            <li>
                <div class="selectedSeatIcon"></div>
                <small class="small">선택 좌석</small>
            </li>
            <li>
                <div class="occupiedSeat"></div>
                <small class="small">예매 좌석</small>
            </li>
        </ul>

      <div id="container">
        <div class="movieContainer">
            <label for="movie">
                Pick a Movie :
            </label>
            <select name="pickMovie" id="movie">
                <option class="price" value="10">Avengers:Endgame ($10)</option>
                <option class="price" value="12">Joker ($12)</option>
                <option class="price" value="8">Toy Story 4 ($8)</option>
                <option class="price" value="9">The Lion King ($9)</option>
            </select>
        </div>
        <ul class="showcase">
            <li>
                <div class="availableSeat"></div>
                <small class="small">선택 가능 좌석</small>
            </li>
            <li>
                <div class="selectedSeatIcon"></div>
                <small class="small">선택하신 좌석</small>
            </li>
            <li>
                <div class="occupiedSeat"></div>
                <small class="small">예매 불가 좌석</small>
            </li>
        </ul>

        <div class="seatContainer">
            <div class="screen"></div>
            <div class="row">
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
            </div>

            <div class="row">
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="occupiedSeat"></span>
                <span class="occupiedSeat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
            </div>

            <div class="row">
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="occupiedSeat"></span>
                <span class="seat"></span>
            </div>

            <div class="row">
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="occupiedSeat"></span>
                <span class="occupiedSeat"></span>
            </div>

            <div class="row">
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
            </div>

            <div class="row">
                <span class="seat"></span>
                <span class="occupiedSeat"></span>
                <span class="occupiedSeat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="seat"></span>
                <span class="occupiedSeat"></span>
                <span class="seat"></span>
            </div>

        </div>

        <p class="text">총 인원수는 <span id="count">0</span> 인 이고 가격은<span id="costs">0</span>입니다.</p>




    </div>


<div>
				<div class="form-style-1 user-pro" action="#">
                <form name = "form1" method="post" action="{{ route('ticketing.store') }}{{ $tmp }}"
	enctype="multipart/form-data">
	@csrf
							
						<h4>예매</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>날짜</label>
                                <input  type="date" name="run_date" value = "{{old('run_date')}}" class="form-control form-control-sm">
							</div>
							<div class="col-md-6 form-it">
								<label>상영관</label>
									<select name="room_id">
              			<option value="" selected>상영관을 선택하세요.</option>
			
        @foreach ($list3 as $row)
            @if ( $row->id == old('room_id') )
                <option value="{{ $row->id }}" selected>{{ $row->room_name }}</option>
            @else
                <option value="{{ $row->id }}">{{ $row->room_name }}</option>
            @endif
        @endforeach
            </select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>시간</label>
								<select name="runtime_id">
              			<option value="" selected>시간을 선택하세요.</option>
			
@foreach ($list2 as $row)
            @if ( $row->id == old('runtime') )
                <option value="{{ $row->id }}" selected>{{ $row->runtime }}</option>
            @else
                <option value="{{ $row->id }}">{{ $row->runtime }}</option>
            @endif
        @endforeach
            </select>
							</div>
							<div class="col-md-6 form-it">
								<label>영화</label>
								<select name="movie_id">
              			<option value="" selected>영화를 선택하세요.</option>
			
		@foreach ($list as $row)
		@if( $row->state==0)
			@if ( $row->id == old('movie_id') )
				
				<option value="{{ $row->id }}" selected>{{ $row->movie_name }}</option>
			@else
				<option value="{{ $row->id }}">{{ $row->movie_name }}</option>
			@endif
		@endif
		@endforeach
            </select>
							</div>
						</div>
						<div class="row">

							<div class="col-md-6">
								<input class="submit" type="submit" value="예매하기">
							</div>
						
					</form>
					<div class="col-md-6">
                        <form action="{{ route('home.index', $row->id) }}">
								@csrf
								<input class="submit" type="submit" value="좌석 재선택" 
										  onClick="return confirm('좌석을 재선택하시겠습니까 ?');"> &nbsp;
							</form>
					</div>
					</div>
				
				</div>
			</div>


    </div>
</div>
    <div id='result'></div>

<script>

document.addEventListener('DOMContentLoaded', () =>{

const seatContainer = document.querySelector('.seatContainer');

const movie = document.getElementById('movie'); // 선택할 영화
let moviePrice = Number(movie.value); // 영화가격 

let count = document.querySelector('#count'); // 인원수
let costs = document.querySelector('#costs'); // 가격

// 선택한 좌석수 텍스트 변경해주기

function countSeatPrice(){
const selectedSeatCount = document.querySelectorAll('.selectedSeat').length;

count.textContent = selectedSeatCount;
costs.textContent = selectedSeatCount * 15000;

}


//좌석 클릭했을때

seatContainer.addEventListener('click', (e) => {

if(e.target.className === 'seat'){
    e.target.className = 'selectedSeat';
} else if(e.target.className === 'selectedSeat'){
    e.target.className = 'seat';
}

countSeatPrice();
})

// 영화 변경할때

movie.addEventListener('change', (e) => {

moviePrice = Number(e.target.value);

countSeatPrice()

})




})
</script>


@endsection()