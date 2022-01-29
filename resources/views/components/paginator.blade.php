<div>
    <form class="form d-flex" id="myPerPage">
        <input type="hidden" name="search" value="{{ $search }}">
        <select name="perPage" class="form-select">
            <option selected disabled>{{ $perPage }}</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        <input class="btn btn-primary" type="submit" value="на страницу">
    </form>
</div>