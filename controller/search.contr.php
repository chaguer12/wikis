<?php
include '../model/wikiDAO.php';

if (isset($_POST['query'])) {
    $searchText = $_POST['query'];
    $wikiOBJ = new WikiDAO();
    $searchResults = $wikiOBJ->Search($searchText);

    // Start the table with styling
    $results = '<style>
                    .results-table {
                        width: 80%; /* Adjust the width as needed */
                        margin: auto;
                        border-collapse: collapse;
                    }
                    .results-table th, .results-table td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    .search-results {
                        text-align: center;
                    }
                </style>';
    $results .= '<div class="search-results"><table class="results-table">';

    // Table header
    $results .= '<tr><th class="text-blue-600">Title</th><th class="text-blue-600">Image</th></tr>';

    // Check if results exist
    if (empty($searchResults)) {
        $results .= '<tr><td colspan="2" class="no-results text-red-600">No results found for your query: <strong class="text-black">' . htmlspecialchars($searchText) . '</strong></td></tr>';
    } else {
        // Loop through each result and format it
        foreach ($searchResults as $result) {
            $results .= '<tr class="search-result">';
            
            // Display title with a link to the wiki page
            $results .= '<td class="text-blue-600 text-lg"><a class="text-xl font-bold tracking-normal text-gray-800" href="wiki.php?wiki_id=' . $result['wiki_id'] . '">' . htmlspecialchars($result['titre']) . '</a></td>';

            // Display image
            if (isset($result['image']) && !empty($result['image'])) {
                $imageData = base64_encode($result['image']);
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                $results .= '<td><img class="rounded-lg" src="' . $imageSrc . '" alt="Article Image" style="width:100px;height:auto;"></td>';
            } else {
                $results .= '<td>No image available</td>';
            }

            $results .= '</tr>';
        }
    }

    $results .= '</table></div>';

    echo $results;
}
?>
