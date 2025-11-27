<form action="" method="get">
                       <div class="input-group">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Masukan kata kunci"
                          aria-label="Masukan kata kunci"
                          aria-describedby="button-addon2"
                          name="s" value="{{ request()->s ?? '' }}"
                        />
                        <button type="submit" class="btn btn-primary" type="button" id="button-addon2">Cari</button>
</form>