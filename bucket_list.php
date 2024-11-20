<!-- php script to include the websites header, a config file and tab title -->
<?php
$title = "Bucket List";
include("includes/header.php");
include("includes/config.php");
?>

<!-- Header text on top of hero image -->
<section class="hero is-medium is-link" style="background-image: url('./images/background.jpg'); background-repeat: no-repeat">
  <div class="hero-body">
    <h1 class="title is-size-1 has-text-centered is-underlined">Bucket list</h1>
  </div>
</section>

<!-- Section panel with a form element to add to or edit in the bucket list -->
<section class="panel container is-max-desktop mt-6">
  <h2 class="panel-heading title has-background-link has-text-white">Lägg till | Uppdatera</h2>
  <div class="panel-block">
    <div class="control">

      <form method="post" class="" action=""> <!-- action="bucket_list.php" -->
        <div class="field">
          <label class="label" for="name">Namn</label>
          <div class="control">
            <input class="input" type="text" placeholder="Namnet på händelsen." id="name" name="name">
          </div>
        </div>

        <div class="field">
          <label class="label" for="description">Beskrivning</label>
          <div class="control">
            <textarea class="textarea" placeholder="Beskriv vad du vill göra." id="description" name="description" required></textarea>
          </div>
        </div>

        <div class="field">
          <label class="label" for="priority">Prioritet</label>
          <div class="control">
            <div class="select">
              <select required id="priority" name="priority">
                <option value="" disabled selected>Prioritet</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            </div>
          </div>
        </div>

        <div class="field">
          <label class="label" for="id">ID | Endast vid uppdatering</label>
          <div class="control">
            <input class="input" type="number" placeholder="Se id i inläggen nedan" id="id" name="id" min="0">
          </div>
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="button is-link" name="submit">Lägg till</button>
            <button class="button is-warning" name="update">Uppdatera</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</section>

<!-- PHP script that instansiate the class/db-connection and checks if submit or update is pressed -->
<?php

//New instance of class with db-connection
$bucketList = new DbBucketList();

// Checks if submit is pressed
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $priority = $_POST['priority'];

  // initiates a method that tests if filled out and send query to db
  if ($bucketList->InsertToBucketList($name, $description, $priority)) {
    echo '<meta http-equiv="refresh" content="0">';
    echo '<p class="has-text-centered">Inlägget sparat i din bucket-list.</p>';
  } else {
    echo '<p style="color:red" class="has-text-centered">Data saknas. Fyll i alla fält!</p>';
  }
}

//Checks if update is pressed and converts $id to int
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $priority = $_POST['priority'];
  $id = intval($_POST['id']);

  // initiates a method that tests if filled out and send query to db
  if ($bucketList->UpdateBucketList($name, $description, $priority, $id)) {
    echo '<meta http-equiv="refresh" content="0">';
    echo '<p style="color:green" class="has-text-centered">Inlägget är uppdaterat i din bucket-list.</p>';
  } else {
    echo '<p style="color:red" class="has-text-centered">Inlägget kunde inte uppdateras!</p>';
  }
}
?>

<!-- Section panel with the bucket list to do-->
<section class="panel container is-max-desktop mt-6">
  <h2 class="panel-heading title">Bucketlist | Att göra</h2>
  <?php

  //New db-class instance
  $fetchBucketList = new DbBucketList();
  $bucketArr = $fetchBucketList->GetBucketList();

  //For each not completed bucket list objekt a new article is created
  foreach ($bucketArr as $bucket) {
    if ($bucket['COMPLETED'] == 0) {

      echo '<article class="panel-block">
        <div class="control">
        <form method="post">
      <h3 class="title is-size-4">' . htmlentities($bucket['POST_NAME'], ENT_QUOTES, 'UTF-8') . ' | Prio ' . htmlentities($bucket['POST_PRIORITY'], ENT_QUOTES, 'UTF-8') . '</h2>
      <p class="subtitle is-size-6 mt-2">
        ' . htmlentities($bucket['POST_DESCRIPTION'], ENT_QUOTES, 'UTF-8') . '
      </p>
      <button class="button is-warning" name="delete" value="' . $bucket['ID'] . ' ">Ta bort</button>
      <button class="button is-success" name="done" value="' . $bucket['ID'] . ' ">Avklarad</button> 
      <p class="is-size-6 has-text-right"><b>ID: ' . $bucket['ID'] . '</b> skapad: ' . $bucket['CREATED_AT'] . '
      </p>
      </form>
      </div>
      </article>';
    };
  };
  echo '</section>';

  //Section panel with the completed bucket list
  echo '<section class="panel container is-max-desktop mt-6  mb-6">
    <h2 class="panel-heading title has-background-success has-text-white">Bucketlist | Slutförda</h2>';

  //For each completed bucket list objekt a new article is created
  foreach ($bucketArr as $bucket) {
    if ($bucket['COMPLETED'] == 1) {
      echo '<article class="panel-block">
        <div class="control">
      <form method="post">
      <h3 class="title is-size-4">' . htmlentities($bucket['POST_NAME'], ENT_QUOTES, 'UTF-8') . ' | Prio ' . htmlentities($bucket['POST_PRIORITY'], ENT_QUOTES, 'UTF-8') . '</h2>
      <p class="subtitle is-size-6 mt-2">
        ' . htmlentities($bucket['POST_DESCRIPTION'], ENT_QUOTES, 'UTF-8') . '
      </p>
      <button class="button is-warning" name="delete" value="' . $bucket['ID'] . ' ">Ta bort</button>
      <p class="is-size-6 has-text-right"><b>ID: ' . $bucket['ID'] . '</b> skapad: ' . $bucket['CREATED_AT'] . '
      </form>
      </div>
      </article>';
    };
  }

  echo '</section>';

  //Checks if button for delete or done is pressed and send the relevant id to the corresponding method
  if (isset($_POST['delete'])) {
    $id = intval($_POST['delete']);
    if($fetchBucketList->DeleteBucketList($id))
    {
      echo '<meta http-equiv="refresh" content="0">';
    }
  }

  if (isset($_POST['done'])) {
    $id = intval($_POST['done']);
    if($fetchBucketList->CompleteBucketList($id))
    {
      echo '<meta http-equiv="refresh" content="0">';
    }
  }
  ?>

</section>

<!-- Includes footer -->
<?php
include("includes/footer.php");
