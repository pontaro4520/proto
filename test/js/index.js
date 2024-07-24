document.addEventListener('DOMContentLoaded', function() {
    const materialRadios = document.querySelectorAll('input[name="material"]');
    const formRadios = document.querySelectorAll('input[name="form"]');
    const thicknessSelectSt = document.getElementById('thickness-select-st');
    const thicknessSelectSus = document.getElementById('thickness-select-sus');
    const thicknessInput = document.getElementById('thickness-input');
    const dimensionInputs = document.getElementById('dimension-inputs');

    function updateThicknessField() {
        const selectedMaterial = document.querySelector('input[name="material"]:checked')?.value;

        thicknessSelectSt.style.display = 'none';
        thicknessSelectSus.style.display = 'none';
        thicknessInput.style.display = 'none';

        if (selectedMaterial === 'st') {
            thicknessSelectSt.style.display = 'inline-block';
        } else if (selectedMaterial === 'sus') {
            thicknessSelectSus.style.display = 'inline-block';
        } else {
            thicknessInput.style.display = 'inline-block';
            thicknessInput.value = '';
        }
    }

    function updateDimensionFields() {
        const selectedForm = document.querySelector('input[name="form"]:checked')?.value;
        dimensionInputs.innerHTML = ''; // Clear existing inputs

        let fields;
        switch (selectedForm) {
            case 'uShape':
                fields = ['A', 'B', 'C'];
                pdfLink = 'pdf/ushape.pdf';
                break;
            case 'lShape':
                fields = ['A', 'B'];
                pdfLink = 'pdf/lshape.pdf';
                break;
            case 'cChannel':
                fields = ['A', 'B', 'C', 'D', 'E'];
                break;
            default:
                return;
        }

    // Create PDF link
    if (pdfLink) {
        const pdfLinkElement = document.createElement('a');
        pdfLinkElement.href = pdfLink;
        pdfLinkElement.textContent = '参考図PDF';
        pdfLinkElement.target = '_blank';
        pdfLinkElement.className = 'pdf-link';
        dimensionInputs.appendChild(pdfLinkElement);
    }

    fields.forEach(field => {
        const input = document.createElement('input');
        input.type = 'number';
        input.id = `dimension-${field.toLowerCase()}`;
        input.name = `dimension-${field.toLowerCase()}`;
        input.placeholder = `Dimension ${field}`;
        input.required = true;

        const label = document.createElement('label');
        label.htmlFor = input.id;
        label.textContent = `Dimension ${field}:`;

        const wrapper = document.createElement('div');
        wrapper.className = 'dimension-wrapper';
        wrapper.appendChild(label);
        wrapper.appendChild(input);

        dimensionInputs.appendChild(wrapper);
    });
}
    function updateFields() {
        updateThicknessField();
        updateDimensionFields();
    }

    materialRadios.forEach(radio => radio.addEventListener('change', updateThicknessField));
    formRadios.forEach(radio => radio.addEventListener('change', updateDimensionFields));

    // 初期状態を設定
    updateFields();
});

// 材料と板厚のマッピング
const thicknessOptions = {
    st: ['1.6', '2.3', '3.2', '4.5', 'その他'],
    sus: ['1.5', '2.0', '3.0', 'その他'],
    al: ['1.5', '2.0', '3.0', 'その他']
};

document.addEventListener('DOMContentLoaded', function() {
    const materialRadios = document.querySelectorAll('input[name="material"]');
    const thicknessSelect = document.getElementById('thickness-select');
    const otherThicknessDiv = document.getElementById('other-thickness');
    const thicknessInput = document.getElementById('thickness-input');

    // 材料選択の変更を監視
    materialRadios.forEach(radio => {
        radio.addEventListener('change', updateThicknessOptions);
    });

    // 板厚選択の変更を監視
    thicknessSelect.addEventListener('change', function() {
        otherThicknessDiv.style.display = this.value === 'その他' ? 'block' : 'none';
        thicknessInput.required = this.value === 'その他';
    });

    // 初期状態で板厚オプションを更新
    updateThicknessOptions();

    function updateThicknessOptions() {
        const selectedMaterial = document.querySelector('input[name="material"]:checked');
        if (selectedMaterial) {
            const options = thicknessOptions[selectedMaterial.value];
            thicknessSelect.innerHTML = '<option value="">選択してください</option>';
            options.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option;
                optionElement.textContent = option;
                thicknessSelect.appendChild(optionElement);
            });
        }
        // 板厚選択をリセット
        thicknessSelect.value = '';
        otherThicknessDiv.style.display = 'none';
        thicknessInput.required = false;
    }
});