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
          centered
          color="deep-purple accent-4 show-arrows"
          next-icon="mdi-arrow-right-bold-box-outline"
          prev-icon="mdi-arrow-left-bold-box-outline"
        >
          <v-tab>Landscape</v-tab>
          <v-tab>City</v-tab>
          <v-tab>Abstract</v-tab>

          <v-tab-item v-for="n in 3" :key="n">
            <v-container fluid>
              <v-col v-if="n == 1">
                <v-card class="mx-auto" outlined>
                  <v-card-title>Project List</v-card-title>
                  <v-data-table
                    :headers="headers"
                    :items="desserts"
                    class="elevation-1"
                  >
                    <template  v-slot:item.calories="{ item }">
                      <div class="text--primary grey--text">{{ item.calories }}%</div>
                      <v-progress-linear rounded  
                        :value="getValue(item.calories)"
                        :color="getColor(item.calories)"
                        dark
                      >
                      </v-progress-linear>
                    </template>
                  </v-data-table>
                </v-card>
                <v-card class="max-auto mt-5" outlined>
                  <v-card-title>User Activity Timeline</v-card-title>
                  <v-card-text>
                    <v-timeline align-top dense>
                      <v-timeline-item color="pink" small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong>New Icon</strong>
                            <div class="text-caption">Mobile App</div>
                          </v-col>
                        </v-row>
                      </v-timeline-item>

                      <v-timeline-item color="teal lighten-3" small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong>Design Stand Up</strong>
                            <div class="text-caption mb-2">Hangouts</div>
                            <v-row class="pa-2">
                              <v-avatar>
                                <v-img
                                  src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairFrida&accessoriesType=Kurt&hairColor=Red&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=GraphicShirt&clotheColor=Gray01&graphicType=Skull&eyeType=Wink&eyebrowType=RaisedExcitedNatural&mouthType=Disbelief&skinColor=Brown"
                                ></v-img>
                              </v-avatar>
                              <div class="pt-1">
                                <strong>Design Stand Up</strong>
                                <div class="text-caption">Hangouts</div>
                              </div>
                            </v-row>
                          </v-col>
                        </v-row>
                      </v-timeline-item>

                      <v-timeline-item color="pink" small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong>Lunch break</strong>
                          </v-col>
                        </v-row>
                      </v-timeline-item>

                      <v-timeline-item color="green lighten-3" small>
                        <v-row class="pt-1">
                          <v-col>
                            <strong>Finish Home Screen</strong>
                            <div class="text-caption">Web App</div>
                          </v-col>
                        </v-row>
                      </v-timeline-item>
                    </v-timeline>
                  </v-card-text>
                </v-card>
                <v-card>
                  <v-card-title>
                    <v-row>
                      <v-select
                        dense
                        :items="items"
                        label="Outlined style"
                        outlined
                      ></v-select>
                      <v-spacer></v-spacer>
                      <v-btn tile color="primary" class="rounded">
                        <v-icon left> mdi-plus </v-icon>
                        Create Invoice
                      </v-btn>
                    </v-row>
                    <v-spacer></v-spacer>
                    <v-row>
                      <v-text-field
                        outlined
                        dense
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                      ></v-text-field>
                      <v-select
                        dense
                        :items="items"
                        label="Outlined style"
                        outlined
                      ></v-select>
                    </v-row>
                  </v-card-title>
                  <v-data-table
                    v-model="selected"
                    :headers="headers2"
                    :items="desserts2"
                    :single-select="singleSelect"
                    sort-desc="id"
                    item-key="name"
                    show-select
                    class="elevation-1"
                  >
                  <template v-slot:headers.status="{ header }">
                    <v-icon class='no-rotate' small>filter_list</v-icon>
                  </template>
                  <template v-slot:item.id="{ item }">
                    <span class="purple--text">{{ item.id }}</span>
                  </template>
                    <template v-slot:item.actions="{ item }">
                      <v-icon  x-small class="mr-2" @click="editItem(item)">
                        mdi-eye-outline
                      </v-icon>
                      <v-icon small class="mr-2" @click="deleteItem(item)">
                        mdi-delete-outline
                      </v-icon>
                      <v-icon small>mdi-dots-vertical</v-icon>
                    </template>

                    <template v-slot:item.status="{ item }">
                      <v-btn color="green" icon x-small v-if="getStatus(item.status) == 'paid'">
                        <v-icon >mdi-check-circle-outline</v-icon>
                      </v-btn>
                      <v-btn icon x-small v-if="getStatus(item.status) == 'draft'">
                        <v-icon >mdi-content-save-outline</v-icon>
                      </v-btn>
                       <v-btn color="pink" icon x-small v-if="getStatus(item.status) == 'send'">
                        <v-icon >mdi-email-outline</v-icon>
                      </v-btn>
                       <v-btn color="red" icon x-small v-if="getStatus(item.status) == 'due'">
                        <v-icon >mdi-alert-circle-outline</v-icon>
                      </v-btn>
                      <v-btn color="yellow" icon x-small v-if="getStatus(item.status) == 'remain'">
                        <v-icon >mdi-chart-timeline-variant</v-icon>
                      </v-btn>
                    </template>
                  </v-data-table>
                </v-card>
              </v-col>
              <v-col v-if="n == 2">
                <span>This is 2 tab</span>
                <!-- <v-col v-for="i in 3" :key="i">
                  
            
                </v-col> -->
              </v-col>
              <v-col v-if="n == 3">
                <span>This is 3 tab</span>
                <!-- <v-col v-for="i in 3" :key="i">
                  
            
                </v-col> -->
              </v-col>
            </v-container>
          </v-tab-item>
        </v-tabs>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  middleware: "auth",

  data() {
    return {
      headers: [
        {
          text: "PROJECT",
          align: "start",
          sortable: false,
          value: "name",
        },

        { text: "TOTAL TASK", value: "fat" },
        { text: "PROGRESS", value: "calories" },
        { text: "HOURS", value: "carbs" },
      ],
      desserts: [
        {
          name: "Frozen Yogurt",
          calories: 60,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: "1%",
        },
        {
          name: "Ice cream sandwich",
          calories: 50,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: "1%",
        },
        {
          name: "Eclair",
          calories: 40,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: "7%",
        },
        {
          name: "Cupcake",
          calories: 20,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: "8%",
        },
        {
          name: "Gingerbread",
          calories: 90,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: "16%",
        },
        {
          name: "Jelly bean",
          calories: 70,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: "0%",
        },
        {
          name: "Lollipop",
          calories: 100,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: "2%",
        },
      ],
      headers2: [
        { text: "#ID", value: "id" },
        { text: "Status", value: "status" },
        {
          text: "PROJECT",
          align: "start",
          sortable: false,
          value: "name",
        },

        { text: "TASKS", value: "fat" },
        { text: "PROGRESS", value: "calories" },
        { text: "HOURS", value: "carbs" },
        { text: "Actions", value: "actions", sortable: false },
      ],
      desserts2: [
        {
          id: "#5036",
          status: "remain",
          name: "Yogurt",
          calories: 60,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: "1%",
        },
        {
          id: "#5035",
          status: "draft",
          name: "Ice cream",
          calories: 50,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: "1%",
        },
        {
          id: "#5034",
          status: "paid",
          name: "Eclair",
          calories: 40,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: "7%",
        },
        {
          name: "Cupcake",
          status: "send",
          calories: 20,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: "8%",
        },
        {
          status: "due",
          name: "Gingerbread",
          calories: 90,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: "16%",
        },
      ],
    };
  },
  methods: {
    getColor(calories) {
      if (calories < 40) return "red";
      else if (calories < 60) return "orange";
      else return "primary";
    },
    getValue(calories) {
      return calories;
    },
    getStatus(status) {
      if (status == "paid") return "paid";
      else if (status == "draft") return "draft";
      else if (status == "send") return "send";
      else if (status == "due") return "due";
      else if (status == "remain") return "remain";
      else return "primary";
    },
  },
};
</script>