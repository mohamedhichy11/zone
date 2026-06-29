@if (session()->has("success"))
         <script>
          Swal.fire({
                    title: "success",
                    text: "{{ session("success") }}",
                    icon: "success"
                  });
         </script>
        @endif