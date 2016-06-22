<div class="user">
    <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
        <img src="{{ !empty(Auth::user()->coverImgUrl) ? func::img_url(Auth::user()->coverImgUrl, 50, 50) : func::img_url('placeholder.png', 50, 50) }}" alt="" class="avatar img-circle">
    </div>
    <h4 class="fs-16 text-muted mt-15 mb-5 fw-300" style="text-transform: capitalize;">{{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</h4>
    <p class="mb-0 text-muted" style="text-transform: capitalize;">Luxify {{ Auth::user()->role }}</p>
</div>
