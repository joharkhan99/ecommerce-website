<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/perfect-scrollbar.js')}}"></script>

<script src="{{asset('js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('js/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('js/dashboards-analytics.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async="" defer="" src="https://buttons.github.io/buttons.js"></script>


<svg id="SvgjsSvg1283" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
  <defs id="SvgjsDefs1284"></defs>
  <polyline id="SvgjsPolyline1285" points="0,0"></polyline>
  <path id="SvgjsPath1286" d="M-1 217.1625L-1 217.1625C-1 217.1625 88.09071568080357 217.1625 88.09071568080357 217.1625C88.09071568080357 217.1625 176.18143136160714 217.1625 176.18143136160714 217.1625C176.18143136160714 217.1625 264.2721470424107 217.1625 264.2721470424107 217.1625C264.2721470424107 217.1625 352.3628627232143 217.1625 352.3628627232143 217.1625C352.3628627232143 217.1625 440.45357840401783 217.1625 440.45357840401783 217.1625C440.45357840401783 217.1625 528.5442940848214 217.1625 528.5442940848214 217.1625C528.5442940848214 217.1625 616.635009765625 217.1625 616.635009765625 217.1625C616.635009765625 217.1625 616.635009765625 217.1625 616.635009765625 217.1625 "></path>
</svg>


<script>
  function previewImages(clear = 'none') {
    var files = document.getElementById("images").files;
    for (var i = 0; i < files.length; i++) {
      preview(files[i]);
    }
  }
  const preview = (file) => {
    const fr = new FileReader();
    fr.onload = () => {
      const img = document.createElement("img");
      img.src = fr.result; // String Base64 
      img.alt = file.name;
      img.width = "60";
      img.height = "60";
      img.style.objectFit = "cover";
      img.style.marginRight = "4px";
      document.querySelector('#product_images').append(img);
    };
    fr.readAsDataURL(file);
  };

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function CHangeProdVIsibility(e) {
    $.ajax({
      type: 'POST',
      url: "{{ route('change_product_availability') }}",
      data: {
        availability: $(e).is(':checked') ? 'yes' : 'no',
        product_id: $(e).attr('data-prod_id')
      },
      success: function(data) {
        if (data.success) {
          $(".alert-success").show();
          $(".alert-success").text(data.success);
          setTimeout(() => {
            $(".alert-success").hide();
          }, 4000);
        } else {
          $(".alert-success").show();
          $(".alert-success").text(data);
          setTimeout(() => {
            $(".alert-success").hide();
          }, 4000);
        }
      }
    });


  }

  // $("input[name='availability']").on("change", function(e) {
  // });

  $("#catform").on("submit", function(e) {
    e.preventDefault();

    var name = $("#cat_name").val();
    var description = $("#cat_description").val();

    $.ajax({
      type: 'POST',
      url: "{{ route('add_category') }}",
      data: {
        name: name,
        description: description
      },
      success: function(data) {
        if (data.success) {
          alert(data.success);
          $("#catlist").append(`<li class="d-flex mb-1 pb-1">
                <div class="avatar flex-shrink-0 me-3" style="
    border: 1px solid;
    text-align: center;
    border-radius: 50%;
    padding-top: 5px;
    font-weight: 700;
    width: 30px;
    height: 30px;
    font-size: 12px;
">
${data.cat.name.substring(0,1).toUpperCase()}
                </div>
                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                  <div class="me-2">
                    <small class="text-muted d-block mb-1">${data.cat.description.substring(0,15)} ...</small>
                    <h6 class="mb-0" style="font-size: 12px;">${data.cat.name.toUpperCase()}</h6>
                  </div>
                  <div class="user-progress d-flex align-items-center gap-1">
                    <h6 class="mb-0" style="font-size: 12px;">${data.cat.CategoryID}</h6>
                  </div>
                </div>
              </li>`);
        } else {
          alert("Error creating category!");
        }
      }
    });

  });
</script>