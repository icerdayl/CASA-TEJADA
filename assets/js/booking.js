const packagePrices = {
  1: 5000,
  2: 6000,
  3: 7000,
  4: 8000,
  5: 10000,
  6: 12000
};

const packageSelect = document.querySelector('select[name="package_id"]');
const extraRoom = document.querySelector('input[name="extra_room"]');
const hall = document.querySelector('input[name="function_hall_ac"]');
const totalPrice = document.getElementById('totalPrice');

function calculateTotal() {
  let total = 0;
  if (packageSelect.value) {
    total += packagePrices[packageSelect.value];
  }
  if (extraRoom.checked) {
    total += 1500;
  }
  if (hall.checked) {
    total += 2000;
  }
  totalPrice.innerText = '₱' + total.toLocaleString();
}

packageSelect.addEventListener('change', calculateTotal);
extraRoom.addEventListener('change', calculateTotal);
hall.addEventListener('change', calculateTotal);

document.getElementById('bookingForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  const response = await fetch('api/booking.php', {
    method: 'POST',
    body: formData
  });
  const result = await response.json();
  const resultBox =
document.getElementById(
'bookingResult'
);

resultBox.classList.remove(
'hidden'
);

resultBox.innerHTML = `

<h2 class="text-2xl font-bold text-green-700 mb-3">
Reservation Submitted Successfully
</h2>

<p class="mb-3">
Please save your reference number:
</p>

<div
class="bg-white border p-4 rounded-xl text-xl font-mono">

${result.reference_number}

</div>

<button
onclick="navigator.clipboard.writeText('${result.reference_number}')"
class="mt-4 bg-teal-600 text-white px-4 py-2 rounded-lg">

Copy Reference Number

</button>

`;

window.scrollTo({
top:document.body.scrollHeight,
behavior:'smooth'
});
});