<div class="text-center col-md-6 mx-auto">
  <form>
    <input name="keyword" type="text" placeholder="検索したいワードを入力" value="{{ $params['keyword'] ?? null }}">
    <div class="row my-2">
      <label for="anniversaries" class="col-md-3 col-form-label">お祝いで検索</label>
      <select class="form-control col-md-9" name="anniversaries">
        <option selected="selected" value="">選択してください</option>
        @foreach($anniversaries as $key => $value)
          <option value="{{ $value }}"}>
            {{ $value }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="row my-2">
      <label for="gender" class="col-md-3 col-form-label">性別で検索</label>
      <select class="form-control col-md-9" name="gender">
        <option selected="selected" value="">選択してください</option>
        @foreach($genders as $key => $value)
          <option value="{{ $value }}"}>
            {{ $value }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="row my-2">
      <label for="relation" class="col-md-3 col-form-label">関係性で検索</label>
      <select class="form-control col-md-9" name="relation">
        <option selected="selected" value="">選択してください</option>
        @foreach($relation as $key => $value)
          <option value="{{ $value }}"}>
            {{ $value }}
          </option>
        @endforeach
      </select>
    </div>
    <button type="submit">検索する</button>
</form>
</div>