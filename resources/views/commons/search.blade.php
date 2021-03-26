<div class="text-left col-12 mx-auto mt-3">
  <form>
    <div class="row">
    <input name="keyword" class="col-12" type="text" placeholder="検索したいワードを入力" value="{{ $params['keyword'] ?? null }}">
    </div>
    <div class="row my-2">
      <label for="anniversaries" class="col-12 col-form-label">お祝いで検索</label>
      <select class="form-control col-12" name="anniversaries">
        <option selected="selected" value="">選択してください</option>
        @foreach($anniversaries as $key => $value)
          <option value="{{ $value }}"}>
            {{ $value }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="row my-2">
      <label for="gender" class="col-12 col-form-label">性別で検索</label>
      <select class="form-control col-12" name="gender">
        <option selected="selected" value="">選択してください</option>
        @foreach($genders as $key => $value)
          <option value="{{ $value }}"}>
            {{ $value }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="row my-2">
      <label for="relation" class="col-12 col-form-label">関係性で検索</label>
      <select class="form-control col-12" name="relation">
        <option selected="selected" value="">選択してください</option>
        @foreach($relation as $key => $value)
          <option value="{{ $value }}"}>
            {{ $value }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="row justify-content-center">
    <button type="submit" class="text-center col-lg-12 col-6">検索する</button>
    </div>
</form>
</div>