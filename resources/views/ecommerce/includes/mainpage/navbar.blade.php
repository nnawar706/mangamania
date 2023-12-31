<!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Genres</span>
                        </div>
                        <ul id="genreList">

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" name="search" id="search" placeholder="Search for items...">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
{{--                        <div class="autocomplete-item-search" id="searchResult">--}}
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset($data['banners'][0]['banners'][0]['photo_path']) }}">
                        <div class="hero__text">
                            <h2 class="text-white">Get 10% discount on your first order!</h2>
                            <p class="text-white">Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

@push('scripts')
    <script type="text/javascript">

    let apiKey = "c704212b54af40b3af542df235f28ac3";

        $(document).ready(function () {
            $.ajax({
                url: `/api/genres?apiKey=${apiKey}`,
                method: "GET",
                success: function (data) {
                    let list = $("#genreList");
                    $.each(data, function(index,genre) {
                        let item = $("<li></li>");
                        let link = $("<a></a>")
                            .attr("href", "/genres/"+genre.id)
                            .text(genre.name);
                        item.append(link);
                        list.append(item);
                    });
                },
                error: function (xhr, status, error) {
                    console.error("Error: ", error);
                }
            })
        });
    </script>
@endpush
