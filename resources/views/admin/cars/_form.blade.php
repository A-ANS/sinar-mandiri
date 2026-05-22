<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold">Merek *</label>
        <select name="brand_id" class="form-select @error('brand_id') is-invalid @enderror" required>
            <option value="">Pilih Merek</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id', $car->brand_id ?? '') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </select>
        @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Nama Mobil *</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $car->name ?? '') }}" required>
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Tipe</label>
        <input type="text" name="type" class="form-control" value="{{ old('type', $car->type ?? '') }}" placeholder="MPV, SUV, Sedan...">
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Tahun *</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', $car->year ?? date('Y')) }}" min="1990" max="2030" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Harga (Rp) *</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', $car->price ?? '') }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kondisi *</label>
        <select name="condition" class="form-select" required>
            <option value="baru" {{ old('condition', $car->condition ?? '') === 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="bekas" {{ old('condition', $car->condition ?? '') === 'bekas' ? 'selected' : '' }}>Bekas</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Warna</label>
        <input type="text" name="color" class="form-control" value="{{ old('color', $car->color ?? '') }}">
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kilometer</label>
        <input type="number" name="mileage" class="form-control" value="{{ old('mileage', $car->mileage ?? 0) }}" min="0">
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Transmisi</label>
        <select name="transmission" class="form-select">
            <option value="Manual" {{ old('transmission', $car->transmission ?? '') === 'Manual' ? 'selected' : '' }}>Manual</option>
            <option value="Otomatis" {{ old('transmission', $car->transmission ?? '') === 'Otomatis' ? 'selected' : '' }}>Otomatis</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Bahan Bakar</label>
        <select name="fuel" class="form-select">
            @foreach(['Bensin','Diesel','Listrik','Hybrid'] as $f)
                <option value="{{ $f }}" {{ old('fuel', $car->fuel ?? '') === $f ? 'selected' : '' }}>{{ $f }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold">Kapasitas Penumpang</label>
        <input type="number" name="seats" class="form-control" value="{{ old('seats', $car->seats ?? 5) }}" min="2">
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Status</label>
        <select name="status" class="form-select">
            <option value="tersedia" {{ old('status', $car->status ?? '') === 'tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="terjual" {{ old('status', $car->status ?? '') === 'terjual' ? 'selected' : '' }}>Terjual</option>
        </select>
    </div>
    <div class="col-12">
        <label class="form-label fw-semibold">Deskripsi</label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $car->description ?? '') }}</textarea>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Foto Utama</label>
        <input type="file" name="thumbnail" class="form-control" accept="image/*">
        @isset($car) @if($car->thumbnail)
            <img src="{{ Storage::url($car->thumbnail) }}" height="80" class="mt-2 rounded">
        @endif @endisset
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold">Foto Galeri (bisa multiple)</label>
        <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
        @isset($car)
        <div class="d-flex flex-wrap gap-2 mt-2">
            @foreach($car->images as $img)
                <img src="{{ Storage::url($img->image) }}" height="60" class="rounded">
            @endforeach
        </div>
        @endisset
    </div>
</div>
