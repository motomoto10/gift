<div class="text-center">
    <form>
    <input name="keyword" type="text" placeholder="検索したいワードを入力" value="{{ $params['keyword'] ?? null }}">
    <select class="form-control" name="gender">
    <option selected="selected" value="">選択してください</option>
    @foreach($genders as $key => $value)
      <option value="{{ $value }}"}>
        {{ $value }}
      </option>
    @endforeach
    </select>
    <select class="form-control" name="relation">
    <option selected="selected" value="">選択してください</option>
    @foreach($relation as $key => $value)
      <option value="{{ $value }}"}>
        {{ $value }}
      </option>
    @endforeach
    </select>
    <button type="submit">検索する</button>
</form>
</div>