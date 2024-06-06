<script>
// Duplicate input file & text
document.addEventListener("DOMContentLoaded", function() {
    const fileInputsContainer = document.getElementById('fileInputs');
    const btnAddFile = document.getElementById('btnAddFile');
    let fileInputCount = 1;

    const textInputContainer = document.getElementById('textInputContainer');
    const btnAddText = document.getElementById('btnAddText');
    let textInputCount = 1;

    btnAddFile.addEventListener('click', function() {
        const fileInputWrapper = document.createElement('div');
        fileInputWrapper.classList.add('flex', 'gap-1');

        const newLabel = document.createElement('label');
        newLabel.classList.add('input', 'bg-transparent', 'border-2', 'border-blue-400', 'flex',
            'items-center', 'gap-2', 'w-full', 'focus-within:outline-none');

        const newFileInput = document.createElement('input');
        newFileInput.setAttribute('type', 'file');
        newFileInput.classList.add('grow', 'file-input', 'file-input-success',
            'border-none', 'bg-transparent', 'py-2', 'file:mr-4', 'file:px-4',
            'file:rounded-full', 'file:border-0', 'file:text-sm', 'file:font-semibold',
            'file:bg-blue-500', 'file:text-white', 'hover:file:bg-transparent',
            'hover:file:text-blue-400');
        newFileInput.setAttribute('placeholder', 'Pilih gambar berita');
        newFileInput.setAttribute('name', `gambar_berita[]`);

        const btnRemove = document.createElement('button');
        btnRemove.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
            'btn-remove');
        btnRemove.innerHTML = `<i class='fas fa-times text-lg'></i>`;
        btnRemove.addEventListener('click', function() {
            fileInputWrapper.remove();
        });

        newLabel.appendChild(newFileInput);
        fileInputWrapper.appendChild(newLabel);
        fileInputWrapper.appendChild(btnRemove);
        fileInputsContainer.appendChild(fileInputWrapper);

        fileInputCount++;
    });

    btnAddText.addEventListener('click', function() {
        const textInputWrapper = document.createElement('div');
        textInputWrapper.classList.add('flex', 'gap-1');

        const newTextInput = document.createElement('input');
        newTextInput.setAttribute('type', 'text');
        newTextInput.classList.add('input', 'input-bordered', 'border-2', 'border-blue-400',
            'w-full');
        newTextInput.setAttribute('placeholder', 'Kategori Berita');
        newTextInput.setAttribute('name', `kategori_berita[]`);

        const btnRemove = document.createElement('button');
        btnRemove.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
            'btn-remove');
        btnRemove.innerHTML =
            `<i class='fas fa-times text-lg'></i>`;
        btnRemove.addEventListener('click', function() {
            textInputWrapper.remove();
        });

        textInputWrapper.appendChild(newTextInput);
        textInputWrapper.appendChild(btnRemove);
        textInputContainer.appendChild(textInputWrapper);

        textInputCount++;
    });
});

// Ekstrakurikuler
document.addEventListener("DOMContentLoaded", function() {
    const fileInputsEkskul = document.getElementById('fileInputsEkskul');
    const btnAddFileEkskul = document.getElementById('btnAddFileEkskul');
    let fileInputEkskulCount = 1;

    btnAddFileEkskul.addEventListener('click', function() {
        const fileInputEkskulWrapper = document.createElement('div');
        fileInputEkskulWrapper.classList.add('flex', 'gap-1');

        const newLabelEkskul = document.createElement('label');
        newLabelEkskul.classList.add('input', 'bg-transparent', 'border-2', 'border-blue-400',
            'flex', 'items-center', 'gap-2', 'w-full', 'focus-within:outline-none');

        const newFileInputEkskul = document.createElement('input');
        newFileInputEkskul.setAttribute('type', 'file');
        newFileInputEkskul.classList.add('grow', 'file-input', 'file-input-success',
            'border-none', 'bg-transparent', 'py-2', 'file:mr-4', 'file:px-4',
            'file:rounded-full', 'file:border-0', 'file:text-sm', 'file:font-semibold',
            'file:bg-blue-500', 'file:text-white', 'hover:file:bg-transparent',
            'hover:file:text-blue-400');
        newFileInputEkskul.setAttribute('placeholder', 'Pilih gambar berita');
        newFileInputEkskul.setAttribute('name', `gambar_ekstrakurikuler[]`);

        const btnRemoveEkskul = document.createElement('button');
        btnRemoveEkskul.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
            'btn-remove');
        btnRemoveEkskul.innerHTML = `<i class='fas fa-times text-lg'></i>`;
        btnRemoveEkskul.addEventListener('click', function() {
            fileInputEkskulWrapper.remove();
        });

        newLabelEkskul.appendChild(newFileInputEkskul);
        fileInputEkskulWrapper.appendChild(newLabelEkskul);
        fileInputEkskulWrapper.appendChild(btnRemoveEkskul);
        fileInputsEkskul.appendChild(fileInputEkskulWrapper);

        fileInputEkskulCount++;
    });
});
// Ekstrakurikuler
// Prestasi Siswa
document.addEventListener("DOMContentLoaded", function() {
    const fileInputsPrestasi = document.getElementById('fileInputsPrestasi');
    const btnAddFilePrestasi = document.getElementById('btnAddFilePrestasi');
    let fileInputPrestasiCount = 1;

    btnAddFilePrestasi.addEventListener('click', function() {
        const fileInputPrestasiWrapper = document.createElement('div');
        fileInputPrestasiWrapper.classList.add('flex', 'gap-1');

        const newLabelPrestasi = document.createElement('label');
        newLabelPrestasi.classList.add('input', 'bg-transparent', 'border-2', 'border-blue-400',
            'flex', 'items-center', 'gap-2', 'w-full', 'focus-within:outline-none');

        const newFileInputPrestasi = document.createElement('input');
        newFileInputPrestasi.setAttribute('type', 'file');
        newFileInputPrestasi.classList.add('grow', 'file-input', 'file-input-success',
            'border-none', 'bg-transparent', 'py-2', 'file:mr-4', 'file:px-4',
            'file:rounded-full', 'file:border-0', 'file:text-sm', 'file:font-semibold',
            'file:bg-blue-500', 'file:text-white', 'hover:file:bg-transparent',
            'hover:file:text-blue-400');
        newFileInputPrestasi.setAttribute('placeholder', 'Pilih gambar berita');
        newFileInputPrestasi.setAttribute('name', `gambar[]`);

        const btnRemovePrestasi = document.createElement('button');
        btnRemovePrestasi.classList.add('btn', 'btn-square', 'btn-outline', 'btn-error',
            'btn-remove');
        btnRemovePrestasi.innerHTML = `<i class='fas fa-times text-lg'></i>`;
        btnRemovePrestasi.addEventListener('click', function() {
            fileInputPrestasiWrapper.remove();
        });

        newLabelPrestasi.appendChild(newFileInputPrestasi);
        fileInputPrestasiWrapper.appendChild(newLabelPrestasi);
        fileInputPrestasiWrapper.appendChild(btnRemovePrestasi);
        fileInputsPrestasi.appendChild(fileInputPrestasiWrapper);

        fileInputPrestasiCount++;
    });
});
// Prestasi Siswa

//Duplicate foto
function duplicateInput() {
    const container = document.getElementById('imageInputsContainer');
    const clone = container.firstElementChild.cloneNode(true);
    container.appendChild(clone);
    // Show the remove button of the newly added input
    clone.querySelector('.btn-remove').classList.remove('hidden');
}

function removeInput(btn) {
    const inputDiv = btn.parentNode.parentNode;
    inputDiv.parentNode.removeChild(inputDiv);
}
</script>