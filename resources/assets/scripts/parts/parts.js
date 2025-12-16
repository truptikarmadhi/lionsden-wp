export class Parts {
  init() {
    this.CounterAnimation();
  }

  CounterAnimation() {
    $(document).ready(function () {
      var duration = 2000; // total animation time (2 seconds)
      var interval = 20; // update speed
      var steps = duration / interval;

      $(".count").each(function () {
        var $this = $(this);
        var targetNumber = parseInt($this.data("number"));
        var current = 0;
        var increment = targetNumber / steps;

        var counter = setInterval(function () {
          current += increment;

          if (current >= targetNumber) {
            $this.text(targetNumber);
            clearInterval(counter);
          } else {
            $this.text(Math.floor(current));
          }
        }, interval);
      });
    });
  }
}
