const show_pass = document.querySelectorAll(".show_pass");
const pass_field = document.querySelectorAll(".pass_field");
console.log(show_pass);
console.log(pass_field);

for (let i = 0; i < show_pass.length; i++) {
  show_pass[i].addEventListener("click", function () {
    if (pass_field[i].type == "password") {
      pass_field[i].type = "text";
    } else {
      pass_field[i].type = "password";
    }
  });
}
