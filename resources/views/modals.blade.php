<div id="modalContainer">
    <!-- Live Data Modal -->
    <div id="liveDataModal" class="modal">
        <div class="modal-content" style="max-width: 90%; width: 1200px;">
            <div class="modal-header">
                <h3>Live Data</h3>
                <button class="close-btn" onclick="closeModal('liveDataModal')">&times;</button>
            </div>
            <div class="modal-body" id="liveDataModalBody">
                <div class="flex justify-center items-center py-10 text-gray-500">Loading...</div>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('liveDataModal')" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Close</button>
            </div>
        </div>
    </div>

    <!-- Summary Data Modal -->
    <div id="summaryDataModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Summary Data</h3>
                <button class="close-btn" onclick="closeModal('summaryDataModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Aggregated trading and performance summary will be displayed here.</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('summaryDataModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- News Updates Modal -->
    <div id="newsUpdatesModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>News Updates</h3>
                <button class="close-btn" onclick="closeModal('newsUpdatesModal')">&times;</button>
            </div>
            <div class="modal-body">
                <div id="newsUpdatesContent"></div>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('newsUpdatesModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Recommendations Modal -->
    <div id="recommendationsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Recommendations</h3>
                <button class="close-btn" onclick="closeModal('recommendationsModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Personalized trading and investment recommendations will be displayed here.</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('recommendationsModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Portfolio Tracking Modal -->
    <div id="portfolioTrackingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Portfolio Tracking</h3>
                <button class="close-btn" onclick="closeModal('portfolioTrackingModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Comprehensive portfolio performance and tracking details will be displayed here.</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('portfolioTrackingModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- One on One with Agent Modal -->
    <div id="oneOnOneModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>One on One with Agent</h3>
                <button class="close-btn" onclick="closeModal('oneOnOneModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Connect with a dedicated trading agent for personalized guidance and support.</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('oneOnOneModal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Premium Package Modal -->
    <div id="premiumPackageModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Premium Package</h3>
                <button class="close-btn" onclick="closeModal('premiumPackageModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Upgrade to our Premium Package for advanced features and exclusive benefits.</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('premiumPackageModal')">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
const newsUpdates = [
    {
        category: "Market News",
        date: "May 10, 2025",
        title: "ZSE All Share Index gains 2.3% amid mining sector rally",
        summary: "The ZSE saw a broad-based rally on Friday led by mining and telecom stocks. Trading volume increased by 15% compared to the previous day."
    },
    {
        category: "Company Announcements",
        date: "May 9, 2025",
        title: "Econet Wireless declares ZWL 3.50 dividend",
        summary: "Econet Wireless announced a final dividend of ZWL 3.50 per share to be paid on June 15, 2025. The company reported strong subscriber growth."
    },
    {
        category: "Regulatory Updates",
        date: "May 8, 2025",
        title: "ZSE reduces transaction fees to boost investor participation",
        summary: "The Zimbabwe Stock Exchange announced a fee cut for retail investors effective next week. This move aims to stimulate more market activity."
    },
    {
        category: "Global Market Impact",
        date: "May 7, 2025",
        title: "Gold price surge expected to benefit Padenga and Caledonia",
        summary: "Global gold prices hit a 6-month high. Analysts expect increased profitability for local mining stocks listed on the ZSE."
    },
    {
        category: "Expert Commentary",
        date: "May 6, 2025",
        title: "Why defensive stocks may outperform in 2025",
        summary: "Analyst John Moyo explains why consumer staples and telecoms could be safer bets amid currency instability and inflation pressure."
    }
];

function showNewsUpdates() {
    const container = document.getElementById('newsUpdatesContent');
    container.innerHTML = newsUpdates.map(news => `
        <div style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
            <div style="font-size: 0.9em; color: #888;">${news.category} · ${news.date}</div>
            <div style="font-weight: bold; color: #1a56db; margin: 5px 0;">${news.title}</div>
            <div style="color: #444;">${news.summary}</div>
        </div>
    `).join('');
}

document.addEventListener('DOMContentLoaded', function() {
    const newsLink = document.getElementById('newsUpdateLink');
    if (newsLink) {
        newsLink.addEventListener('click', function() {
            showNewsUpdates();
            if (typeof openModal === 'function') {
                openModal('newsUpdatesModal');
            } else {
                document.getElementById('newsUpdatesModal').style.display = 'block';
            }
        });
    }
});
</script>