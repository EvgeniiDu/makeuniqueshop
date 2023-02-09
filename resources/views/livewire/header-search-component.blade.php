<div>
    <form action="{{ route('product.search') }}" method="get">
        <div class="search_item">
            <div class="input-group">
                <form>
                    <input type="search" name="search" class="form-control rounded" placeholder="Я шукаю..." aria-label="Знайти" aria-describedby="search-addon" />
                    <button type="submit" class="btn btn-success search_submit" value="Знайти">Знайти</button>
                </form>
            </div>
        </div>
    </form>
</div>
