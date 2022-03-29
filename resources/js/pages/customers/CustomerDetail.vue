<template>
  <v-row>
    <v-col lg="4" md="5">
      <v-card>
        <v-card-title class="flex-column justify-center">
          <v-avatar tile color="grey darken-1" size="128" class="mb-4" />
          <span class="mb-2">Ahmad Ishaq</span>
          <v-btn color="red" class="ma-2 white--text" outlined text>
            Admin
          </v-btn>
          <v-card-text>
            <h2 class="text-xl font-semibold mb-2">Customer Details</h2>
            <v-divider />
            <v-list dense>
              <v-list-item class="px-0 mb-n2">
                <span class="font-weight-medium me-2">Name:</span>
                <span class="text--secondary">John Doe</span>
              </v-list-item>
              <v-list-item class="px-0 mb-n2">
                <span class="font-weight-medium me-2">Phone:</span>
                <span class="text--secondary">+92-345-123459761</span>
              </v-list-item>
              <v-list-item class="px-0 mb-n2">
                <span class="font-weight-medium me-2">Phone:</span>
                <span class="text--secondary">+92-345-123459761</span>
              </v-list-item>
              <v-list-item class="px-0 mb-n2">
                <span class="font-weight-medium me-2">Phone:</span>
                <span class="text--secondary">+92-345-123459761</span>
              </v-list-item>
              <v-list-item class="px-0 mb-n2">
                <span class="font-weight-medium me-2">Phone:</span>
                <span class="text--secondary">+92-345-123459761</span>
              </v-list-item>
            </v-list>
          </v-card-text>
          <div>
            <v-btn depressed color="primary"> Edit </v-btn>
            <v-btn class="ma-2" outlined color="red"> Suspended </v-btn>
          </div>
        </v-card-title>
      </v-card>
      <v-card class="mt-5">
        <v-card-title flex-start align_start>
          <span
            class="
              v-chip-light-bg
              font-weight-semibold
              mb-3
              me-3
              v-chip v-chip--label
              theme--light
              v-size--small
              primary
            "
            >Standard</span
          >
          <div class="spacer"></div>
          <sup class="primary--text">$</sup>
          <span class="text-5xl font-weight-semibold primary--text">99</span>
          <sub class="text-base font-weight-light">/month</sub>
        </v-card-title>
        <v-card-text>
          <v-list-item class="px-0 mb-n2">
            <span class="font-weight-medium me-2">Phone:</span>
            <span class="text--secondary">+92-345-123459761</span>
          </v-list-item>
          <v-list-item class="px-0 mb-n2">
            <span class="font-weight-medium me-2">Phone:</span>
            <span class="text--secondary">+92-345-123459761</span>
          </v-list-item>
          <v-list class="transparent">
            <v-list-item>
              <v-list-item-title>Days</v-list-item-title>

              <!-- <v-list-item-icon>
                <v-icon>{{ item.icon }}</v-icon>
              </v-list-item-icon> -->

              <v-list-item-subtitle class="text-right">
                26 of 30 Days
              </v-list-item-subtitle>
            </v-list-item>
            <v-list-item>
              <v-progress-linear
                color="indigo"
                rounded
                value="80"
              ></v-progress-linear>
            </v-list-item>
          </v-list>
          <span>6 Days remaining</span>
        </v-card-text>
      </v-card>
    </v-col>
    <v-col lg="8" md="7"> 
      <v-card>
    <v-tabs
      v-model="tab"
      background-color="primary"
      dark
    >
      <v-tab
        v-for="item in items"
        :key="item.tab"
      >
        {{ item.tab }}
      </v-tab>
    </v-tabs>

    <v-tabs-items v-model="tab">
      <v-tab-item
        v-for="item in items"
        :key="item.tab"
      >
        <v-card flat>
          <v-card-text>{{ item.content }}</v-card-text>
        </v-card>
      </v-tab-item>
    </v-tabs-items>
  </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  middleware: "auth",

  data () {
      return {
        tab: null,
        items: [
          { tab: 'One', content: 'Tab 1 Content' },
          { tab: 'Two', content: 'Tab 2 Content' },
          { tab: 'Three', content: 'Tab 3 Content' },
          { tab: 'Four', content: 'Tab 4 Content' },
          { tab: 'Five', content: 'Tab 5 Content' },
          { tab: 'Six', content: 'Tab 6 Content' },
          { tab: 'Seven', content: 'Tab 7 Content' },
          { tab: 'Eight', content: 'Tab 8 Content' },
          { tab: 'Nine', content: 'Tab 9 Content' },
          { tab: 'Ten', content: 'Tab 10 Content' },
        ],
      }
    },
};

</script>