document.addEventListener('DOMContentLoaded', function() {
    const salaryRange = document.getElementById('salary-range');
    const salaryValue = document.getElementById('salary-value');
    const salaryMax = document.getElementById('salary-max');
    const minSalaryInput = document.getElementById('min-salary');
    const maxSalaryInput = document.getElementById('max-salary');

    // Lấy giá trị từ query string
    const urlParams = new URLSearchParams(window.location.search);
    const minSalary = urlParams.get('min_salary') || 10000;
    const maxSalary = urlParams.get('max_salary') || 50000000;
    const jobTypes = urlParams.getAll('job_types[]') || [];

    // Khởi tạo thanh trượt
    noUiSlider.create(salaryRange, {
        start: [minSalary, maxSalary],
        connect: true,
        range: {
            'min': 10000,
            'max': 50000000
        },
        step: 5000,
    });

    // Cập nhật giá trị khi thanh trượt thay đổi
    salaryRange.noUiSlider.on('update', function(values) {
        salaryValue.textContent = `${Math.round(values[0]).toLocaleString('vi-VN')} VNĐ`;
        salaryMax.textContent = `${Math.round(values[1]).toLocaleString('vi-VN')} VNĐ`;
        minSalaryInput.value = Math.round(values[0]);
        maxSalaryInput.value = Math.round(values[1]);
    });

    // Đặt giá trị ban đầu của thanh trượt từ query string
    salaryRange.noUiSlider.set([minSalary, maxSalary]);

    // Đánh dấu lại các checkbox dựa trên giá trị từ query string
    document.querySelectorAll('input[name="job_types[]"]').forEach(checkbox => {
        if (jobTypes.includes(checkbox.value)) {
            checkbox.checked = true;
        }
    });
});