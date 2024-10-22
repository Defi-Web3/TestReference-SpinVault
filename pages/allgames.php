<?php 
include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/header.php");
?>

<!-- main section -->
<main class="main-section all-games" role="container">
    <section class="banner-allgames">
        <div class="container d-flex flex-column flex-lg-row position-relative text-wrapper">
            <div class="d-flex flex-column justify-content-center custom-width text-white gap-2 py-3 mt-3">
                <div class="fw-bold text-big">
                    <p class="w-md-50 w-lg-100 mx-auto text-center text-lg-start fst-italic">
                        Have Fun with the Best Social Casino Games Selection at SpinVault
                    </p>
                </div>
                <div class="banner-small-text">
                    <p class="fw-medium text-center text-lg-start ">
                        A Welcome Bonus is ready for you to Collected<br class="d-none d-lg-block"> when you Sign-Up
                    </p>
                </div>
                <div class="banner-signup-btn">
                    <button class="w-100 text-uppercase mt-3 d-block px-4 py-3 rounded btn-gradient btn-gradient-link btn-lg" data-state="closed">
                        <a class="fw-bold text-white text-decoration-none" href="/pages/register.php">Create Account</a>
                    </button>
                </div>
            </div>
            <div class="banner-right-image position-absolute">
                <img src="dragon.png" alt="picture" class="w-full d-none d-md-block">
            </div>
            <div class="mobile-image d-flex w-full w-md-50 d-md-none">
                <div class="w-full align-bottom d-flex flex-column justify-content-end">
                    <img src="old-man.png" alt="picture" class="w-full d-md-none">
                </div>
            </div>
        </div>
    </section>

    <section class="dive-in casino-games">
        <div class="w-full bg-blue">
            <div class="container text-center py-5">
                <div class="mb-4 fw-bold text-white bold-text">Social casino games<br class="d-none d-lg-block"> at your
                    fingertips
                </div>
                <p class="small-text text-white fw-medium">With over 150 games to choose from,<br
                    class="d-none d-lg-block"> there is always something new to play.
                </p>

                <!--Dynamic games section-->
                <div class="row row-cols-3 row-cols-md-4 row-cols-lg-6 mt-4 game-image" id="games-data-container">
                </div>
                <!--Dynamic games section ends-->        

            </div>
        </div>
    </section>

    <section class="spinvault">
        <div class="w-full bg-blue">
            <div class="container text-center">
                <div class="row text-detail text-white">
                    <div class="col">
                        <div class="slot-text fw-bold bold-text fst-italic">Why Play Free Slots & Casino-Style Games at
                            SpinVault?
                        </div>
                        <p class="text-center slot-desc fw-medium small-text mt-3">It's never been easier to enjoy free
                            casino-style games and exciting slots online at SpinVault. We made it that way specially so
                            you can focus more time having fun and less time fussing. Here's why you'll love playing
                        SpinVault time and time again.</p>
                    </div>
                </div>

                <div class="row text-detail text-white">
                    <div class="col-md-6 text-wrap mb-0 mb-md-auto">
                        <div class="section-title fw-bold small-text mb-3">Hundreds of Casino-Style Games</div>
                        <p class="desc-text fw-medium fst-italic">With fresh new slots games dropping almost every week,
                            we've got hundreds of online casino-style games to play for free, without so much as a
                            download in sight! Stream your favorite games straight from your browser on any device. At
                            SpinVault, there's something for every slots and casino game player—from Roulette to
                            Blackjack to Video Poker and Jackpot slots—so the chances are, you'll always find something
                        you love!</p>
                    </div>
                    <div class="col-md-6 text-wrap">
                        <div class="section-title fw-bold small-text mb-3">Join the SpinVault Fam!</div>
                        <p class="desc-text fw-medium fst-italic">Over one million players enjoy our free online
                            casino-style games, including a vast collection of exciting slots, every single day! Join
                            the SpinVault fam for fun, games, giggles and friendly chats. Our SpinVault community is a
                            friendly bunch—join them on social media for more competitions and even more SpinVault fun.
                            We love making a fuss of our players. So much so, you'll find a peachy welcome offer waiting
                        for you when you sign up.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!--- footer ---->
<?php include_once($_SERVER['DOCUMENT_ROOT']."/commonComponents/footer.php") ?>