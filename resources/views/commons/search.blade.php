<div class="text-center">
    <form>
    <input name="keyword" type="text" placeholder="検索したいワードを入力" value="{{ $params['keyword'] ?? null }}">
    <h2>お祝いは？</h2>
    
    <input type="checkbox" name="anniversaries[]" value="誕生日"> 誕生日　
    <input type="checkbox" name="anniversaries[]" value="結婚記念日"> 結婚記念日　
    <input type="checkbox" name="anniversaries[]" value="出産祝い"> 出産祝い　
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