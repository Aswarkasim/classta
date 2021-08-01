 <style>
   .bd-placeholder-img {
     font-size: 1.125rem;
     text-anchor: middle;
     -webkit-user-select: none;
     -moz-user-select: none;
     user-select: none;
   }

   @media (min-width: 768px) {
     .bd-placeholder-img-lg {
       font-size: 3.5rem;
     }
   }

   .form-signin {
     width: 100%;
     max-width: 330px;
     padding: 15px;
     margin: auto;
   }

   .form-signin .checkbox {
     font-weight: 400;
   }

   .form-signin .form-floating:focus-within {
     z-index: 2;
   }

   .form-signin input[type="email"] {
     margin-bottom: -1px;
     border-bottom-right-radius: 0;
     border-bottom-left-radius: 0;
   }

   .form-signin input[type="password"] {
     margin-bottom: 10px;
     border-top-left-radius: 0;
     border-top-right-radius: 0;
   }
 </style>


 <!-- Custom styles for this template -->
 <link href="signin.css" rel="stylesheet">




 <main class="form-signin">
   <form action="<?= base_url('home/auth'); ?>" method="post">
     <h1 class="h3 my-3 fw-normal text-center"><b>Silakan Login</b></h1>
     <p class="text-center text-muted">Sesuatu sedang menunggumu.</p>
     <?php
      echo validation_errors('<div class="text-danger">', '</div>');
      if (isset($error)) {
        echo $error;
      }

      ?>
     <div class="form-gorup mt-3">
       <label for="">Username</label>
       <input type="text" placeholder="Username" name="username" class="form-control py-2">
     </div>
     <div class="form-gorup mt-3">
       <label for="">Password</label>
       <input type="password" placeholder="Password" name="password" class="form-control py-2">
     </div>

     <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
   </form>
   <p class="mt-5 mb-3 text-muted">
     Belum punya akun? register di <a href="<?= base_url('home/auth/register'); ?>">sini</a>
   </p>
 </main>