// @ts-check

// BEGIN (write your solution here)
export default () => {
  const modalButtons = document.querySelectorAll('[data-toggle="modal"]');
  modalButtons.forEach((btn) => {
    const modal = document.querySelector(btn.dataset.target);
    const closeModal = modal.querySelector('[data-dismiss="modal"]');

    btn.addEventListener('click', () => {
      modal.classList.add('show');
      modal.style.display = 'block';
    });

    closeModal.addEventListener('click', () => {
      modal.classList.remove('show');
      modal.style.display = 'none';
    });
  });
};
// END
