
<form action="index.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="genre" class="form-label">Genre:</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year:</label>
        <input type="text" class="form-control" id="year" name="year" required>
    </div>
    <div class="mb-3">
        <label for="ratings" class="form-label">Ratings:</label>
        <input type="text" class="form-control" id="ratings" name="ratings" required>
    </div>
    <div class="mb-3">
        <label for="streamingService" class="form-label">Streaming-Service:</label>
        <input type="text" class="form-control" id="streamingService" name="streamingService" required>
    </div>
    <button type="submit" class="btn btn-primary">Film anlegen</button>
</form>

