<script>
    function ratingCreate(button, rating , user_id, movie_id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.post("{{route('rating')}}", {rating: rating, user_id: user_id, movie_id: movie_id, _token: CSRF_TOKEN} )
            .done(function (data) {
                if (data.status === "ratingExist"){
                    $.post("{{route('rating-update')}}", {rating: rating, user_id: user_id, movie_id: movie_id, _token: CSRF_TOKEN, _method: 'PUT'} )
                        .done(function (data) {
                            //$(button).parent().siblings(".rate").children("p,span.rating-average").val(data.rating_average);
                            if (data.rating === 1) {
                                $(button).parent().siblings(".rate").children("p").first()
                                    .html("<p>" +
                                        "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                        "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                        "                            </p>"
                                    );
                                $(button).children().removeClass().addClass("ion-ios-star");
                                $(button).siblings(".star1, .star2, .star3, .star4, .star5").children().removeClass().addClass("ion-ios-star-outline");
                                $(button).siblings("p").text("Your Rate:");
                            }
                            if (data.rating === 2) {
                                $(button).parent().siblings(".rate").children("p").first()
                                    .html("<p>" +
                                        "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                        "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                        "                            </p>"
                                    );
                                $(button).children().removeClass().addClass("ion-ios-star");
                                $(button).siblings(".star3, .star4, .star5").children().removeClass().addClass("ion-ios-star-outline");
                                $(button).siblings(".star1").children().removeClass().addClass("ion-ios-star");
                                $(button).siblings("p").text("Your Rate:");
                            }
                            if (data.rating === 3) {
                                $(button).parent().siblings(".rate").children("p").first()
                                    .html("<p>" +
                                        "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                        "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                        "                            </p>"
                                    );
                                $(button).children().removeClass().addClass("ion-ios-star");
                                $(button).siblings(".star4, .star5").children().removeClass().addClass("ion-ios-star-outline");
                                $(button).siblings(".star1, .star2").children().removeClass().addClass("ion-ios-star");
                                $(button).siblings("p").text("Your Rate:");
                            }
                            if (data.rating === 4) {
                                $(button).parent().siblings(".rate").children("p").first()
                                    .html("<p>" +
                                        "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                        "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                        "                            </p>"
                                    );
                                $(button).children().removeClass().addClass("ion-ios-star");
                                $(button).siblings(".star5").children().removeClass().addClass("ion-ios-star-outline");
                                $(button).siblings(".star1, .star2, .star3").children().removeClass().addClass("ion-ios-star");
                                $(button).siblings("p").text("Your Rate:");
                            }
                            if (data.rating === 5) {
                                $(button).parent().siblings(".rate").children("p").first()
                                    .html("<p>" +
                                        "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                        "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                        "                            </p>"
                                    );
                                $(button).children().removeClass().addClass("ion-ios-star");
                                $(button).siblings(".star1, .star2, .star3, .star4").children().removeClass().addClass("ion-ios-star");
                                $(button).siblings("p").text("Your Rate:");
                            }

                        })
                }
                else {
                    if (data.rating === 1) {
                        $(button).parent().siblings(".rate").children("p").first()
                            .html("<p>" +
                                "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                "                            </p>"
                            );
                        $(button).children().removeClass().addClass("ion-ios-star");
                        $(button).siblings(".star1, .star2, .star3, .star4, .star5").children().removeClass().addClass("ion-ios-star-outline");
                        $(button).siblings("p").text("Your Rate:");
                    }
                    if (data.rating === 2) {
                        $(button).parent().siblings(".rate").children("p").first()
                            .html("<p>" +
                                "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                "                            </p>"
                            );
                        $(button).children().removeClass().addClass("ion-ios-star");
                        $(button).siblings(".star3, .star4, .star5").children().removeClass().addClass("ion-ios-star-outline");
                        $(button).siblings(".star1").children().removeClass().addClass("ion-ios-star");
                        $(button).siblings("p").text("Your Rate:");
                    }
                    if (data.rating === 3) {
                        $(button).parent().siblings(".rate").children("p").first()
                            .html("<p>" +
                                "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                "                            </p>"
                            );
                        $(button).children().removeClass().addClass("ion-ios-star");
                        $(button).siblings(".star4, .star5").children().removeClass().addClass("ion-ios-star-outline");
                        $(button).siblings(".star1, .star2").children().removeClass().addClass("ion-ios-star");
                        $(button).siblings("p").text("Your Rate:");
                    }
                    if (data.rating === 4) {
                        $(button).parent().siblings(".rate").children("p").first()
                            .html("<p>" +
                                "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                "                            </p>"
                            );
                        $(button).children().removeClass().addClass("ion-ios-star");
                        $(button).siblings(".star5").children().removeClass().addClass("ion-ios-star-outline");
                        $(button).siblings(".star1, .star2, .star3").children().removeClass().addClass("ion-ios-star");
                        $(button).siblings("p").text("Your Rate:");
                    }
                    if (data.rating === 5) {
                        $(button).parent().siblings(".rate").children("p").first()
                            .html("<p>" +
                                "       <span class='rating-average'>"+data.rating_average+"</span> /5<br>\n" +
                                "                            <span class='rv'>Overall Rating ("+data.rating_count+")</span>\n" +
                                "                            </p>"
                            );
                        $(button).children().removeClass().addClass("ion-ios-star");
                        $(button).siblings(".star1, .star2, .star3, .star4").children().removeClass().addClass("ion-ios-star");
                        $(button).siblings("p").text("Your Rate:");
                    }
                }

            })

    }

</script>
